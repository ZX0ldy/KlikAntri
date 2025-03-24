<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Antrian;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DaftarantriControlller extends Controller
{
    public function index()
    {
        // Get today's date
        $today = Carbon::today();

        // Get all active polis
        $polis = Poli::where('status', 2)->get();

        // Get antrians with "Memanggil" or "Dipanggil" status for today
        $antrians = Antrian::whereIn('status', ['Memanggil', 'Dipanggil'])
                   ->orderBy('updated_at', 'desc')
                   ->get();

        // Ambil pengaturan marquee dari database
        $marqueeText = Setting::getValue('marquee_text', 'JAM BUKA KAMI ADALAH PUKUL 07:00 s.d 21:00. TERIMA KASIH ATAS KUNJUNGAN ANDA');
        $marqueeSpeed = Setting::getValue('marquee_speed', 15);

        // If request wants JSON (for AJAX)
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'polis' => $polis,
                'antrians' => $antrians
            ]);
        }

        // Otherwise return the view with marquee settings
        return view('daftarantrian', compact('polis', 'antrians', 'marqueeText', 'marqueeSpeed'));
    }

    // API for marking an antrian as called
    public function markAsCalled(Request $request)
{
    $request->validate([
        'antrian_id' => 'required|exists:antrians,id',
    ]);

    $antrian = Antrian::findOrFail($request->antrian_id);

    if ($antrian->status === 'Memanggil') {
        $antrian->status = 'Dipanggil';
        $antrian->save();
    }

    return response()->json([
        'success' => true,
        'message' => 'Status antrian berhasil diperbarui'
    ]);
}


    // Call next number in queue
    public function callNext(Request $request)
    {
        $request->validate([
            'poli_id' => 'required|exists:polis,id',
        ]);

        // Find the next waiting antrian for this poli
        $nextAntrian = Antrian::where('poli_id', $request->poli_id)
                      ->where('status', 'menunggu')
                      ->whereDate('tanggal', Carbon::today())
                      ->orderBy('nomor_antrian', 'asc')
                      ->first();

        if (!$nextAntrian) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada antrian yang menunggu'
            ]);
        }

        // Update status to "Memanggil"
        $nextAntrian->status = 'Memanggil';
        $nextAntrian->jumlah_panggilan = 0; // Reset call count
        $nextAntrian->save();

        return response()->json([
            'success' => true,
            'antrian' => $nextAntrian,
            'message' => 'Nomor antrian dipanggil'
        ]);
    }
}
