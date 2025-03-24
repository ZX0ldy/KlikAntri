<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\User;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class PoliDokterController extends Controller
{
    public function index()
    {
        // Ambil semua data poli yang aktif (status 1 atau 2)
        $polis = Poli::whereIn('status', [1, 2])->get();

        return view('poli_dokter.index', compact('polis'));
    }

    public function getDokterByPoli($id)
    {
        // Ambil data poli
        $poli = Poli::findOrFail($id);

        // Ambil dokter yang berada di poli tersebut
        // role_id = 3 untuk dokter
        $dokters = User::with('jadwals')
                    ->where('role_id', 3)
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
}
