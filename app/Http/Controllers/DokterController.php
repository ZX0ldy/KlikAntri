<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\User;
use App\Models\Antrian;
use App\Models\Reservasi;
use App\Models\Rujukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator; // Pastikan ini diimpor

class DokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Validasi akses poli
        if (!$user->akses_poli_id) {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke poli manapun.');
        }

        // Ambil data poli yang ditugaskan ke dokter
        $poli = $user->akses;
        $poli_akses = Poli::all();

        // Ambil antrian berdasarkan poli yang ditugaskan ke dokter untuk hari ini
        $antrian = Antrian::where('poli_id', $user->akses_poli_id)
                     ->get();

        // Ambil data reservasi untuk poli ini
        $reservasi = Reservasi::where('poli_id', $user->akses_poli_id)
                      ->whereDate('tanggal', Carbon::today())
                      ->where('status', 'pending')
                      ->orderBy('nomor_antrian')
                      ->get();

        return view('pegawaipoli.dok', [
            'user' => $user,
            'poli' => $poli,
            'antrian' => $antrian ?? collect(),
            'reservasi' => $reservasi ?? collect(),
            'poli_akses' => $poli_akses
        ]);
    }

    public function updateStatus(Request $request)
    {
        try {
            $antrianId = $request->input('id');
            $status = $request->input('status');

            $antrian = Antrian::findOrFail($antrianId);
            $antrian->status = $status;
            $antrian->save();

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Status antrian berhasil diperbarui menjadi ' . $status);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status antrian: ' . $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $antrianId = $request->input('id');
            $antrian = Antrian::findOrFail($antrianId);

            // Simpan informasi untuk feedback
            $nomorAntrian = $antrian->nomor_antrian;

            // Hapus data
            $antrian->delete();

            return redirect()->back()->with('success', "Antrian nomor {$nomorAntrian} berhasil diakhiri");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengakhiri antrian: ' . $e->getMessage());
        }
    }

    public function panggilAntrian(Request $request)
    {
        $request->validate([
            'antrian_id' => 'required|exists:antrians,id'
        ]);

        $antrian = Antrian::find($request->antrian_id);
        $antrian->status = 'dipanggil';
        $antrian->needs_audio = true; // Mark for audio announcement
        $antrian->save();

        return response()->json([
            'success' => true,
            'message' => 'Pasien berhasil dipanggil'
        ]);
    }

    public function mulaiLayanan(Request $request)
    {
        $user = Auth::user();
        $antrian = Antrian::where('id', $request->antrian_id)
                      ->where('poli_id', $user->akses_poli_id)
                      ->first();

        if (!$antrian) {
            return response()->json([
                'success' => false,
                'message' => 'Antrian tidak ditemukan atau tidak valid.'
            ]);
        }

        // Update status menjadi 'dilayani'
        $antrian->status = 'dilayani';
        $antrian->save();

        return response()->json([
            'success' => true,
            'message' => 'Pasien sedang dilayani.'
        ]);
    }

    public function selesaiLayanan(Request $request)
    {
        $user = Auth::user();
        $antrian = Antrian::where('id', $request->antrian_id)
                      ->where('poli_id', $user->akses_poli_id)
                      ->first();

        if (!$antrian) {
            return response()->json([
                'success' => false,
                'message' => 'Antrian tidak ditemukan atau tidak valid.'
            ]);
        }

        // Hapus data antrian
        $antrian->delete();

        return response()->json([
            'success' => true,
            'message' => 'Layanan selesai dan data antrian telah dihapus.'
        ]);
    }

    /**
     * Accept reservation and add to queue
     */
    public function acceptReservation(Request $request)
    {
        try {
            $reservasiId = $request->input('id');
            $reservasi = Reservasi::findOrFail($reservasiId);

            // Create new antrian entry from the reservation
            $antrian = new Antrian();
            $antrian->poli_id = $reservasi->poli_id;
            $antrian->nomor_antrian = $reservasi->nomor_antrian;
            $antrian->status = 'Online';
            $antrian->save();

            // Update reservation status
            $reservasi->status = 'accepted';
            $reservasi->save();

            return redirect()->back()->with('success', 'Reservasi berhasil diterima dan ditambahkan ke antrian');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menerima reservasi: ' . $e->getMessage());
        }
    }

    /**
     * Reject reservation
     */
    public function rejectReservation(Request $request)
    {
        try {
            $reservasiId = $request->input('id');
            $reservasi = Reservasi::findOrFail($reservasiId);

            // Update reservation status
            $reservasi->status = 'rejected';
            $reservasi->save();

            return redirect()->back()->with('success', 'Reservasi berhasil ditolak');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menolak reservasi: ' . $e->getMessage());
        }
    }

    public function storeReservasi(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'alasan'  => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data ke database
        $reservasi = new Reservasi();
        $reservasi->poli = $request->poli ?? 'Poli Default'; // Jika perlu menyimpan poli
        $reservasi->tanggal = $request->tanggal;
        $reservasi->alasan = $request->alasan;
        $reservasi->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Reservasi berhasil dibuat!');
    }
}
