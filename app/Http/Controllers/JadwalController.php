<?php
namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\User;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function editJadwal()
    {
        $polis = Poli::whereIn('status', [1, 2])->get();  // Mengambil poli yang aktif
        return view('admin.editjadwal', compact('polis'));
    }

    public function getDokterByPoli($id)
    {
        // Ambil data poli
        $poli = Poli::findOrFail($id);

        // Ambil dokter yang berada di poli tersebut
        // role_id = 3 untuk dokter
        $dokters = User::with('jadwals')
                    ->where('role_id', 2)
                    ->where('akses_poli_id', $id)
                    ->get();

        $doktersData = [];

        foreach ($dokters as $dokter) {
            // Daftar hari
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            $jadwal = [];

            foreach ($hari as $h) {
                $status = $dokter->getJadwalStatus($h);
                $jadwal[$h] = $status;
            }

            $doktersData[] = [
                'id' => $dokter->id,
                'name' => $dokter->name,
                'foto' => $dokter->foto,
                'jadwal' => $jadwal
            ];
        }

        return response()->json([
            'success' => true,
            'data' => [
                'poli' => $poli,
                'dokters' => $doktersData
            ]
        ]);
    }

    public function updateJadwal(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'hari' => 'required|string',
            'status' => 'required|boolean'
        ]);

        // Cek apakah jadwal sudah ada
        $jadwal = JadwalDokter::where([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari
        ])->first();

        if ($jadwal) {
            // Update jadwal yang sudah ada
            $jadwal->status = $request->status;
            $jadwal->save();
        } else {
            // Buat jadwal baru
            JadwalDokter::create([
                'dokter_id' => $request->dokter_id,
                'hari' => $request->hari,
                'status' => $request->status
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Jadwal dokter berhasil diperbarui'
        ]);
    }
}
