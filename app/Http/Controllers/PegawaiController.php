<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\User;
use App\Models\Antrian;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function jadwal()
    {
        $polis = Poli::with('dokters')->get(); // Ambil semua poli beserta dokternya
        return view('pegawai.edit_jadwal', compact('polis')); // Kirim ke view
    }
    public function index()
    {
        // Ambil semua data poli
        $polis = Poli::all();

        // Ambil data antrian untuk semua poli
        $antrians = Antrian::with('poli')->whereDate('created_at', today())
                          ->orderBy('nomor_antrian')
                          ->get();

        return view('pegawai.pegawai', compact('polis', 'antrians'));
    }

    public function antrianPoli($poliId)
    {
        $poli = Poli::findOrFail($poliId); // Ambil poli berdasarkan ID
        $antrians = Antrian::where('poli_id', $poliId)
                          ->whereDate('created_at', today())
                          ->orderBy('nomor_antrian')
                          ->get();
        $polis = Poli::all();

        return view('pegawai.antrian_poli', compact('poli', 'antrians', 'polis'));
    }


    public function panggilAntrian(Request $request)
    {
        $antrian = Antrian::find($request->antrian_id);
        $antrian->status = 'dipanggil';
        $antrian->save();

        return redirect()->back()->with('success', 'Antrian berhasil dipanggil');
    }

    public function akhiriAntrian(Request $request)
    {
        $antrian = Antrian::find($request->antrian_id);
        $antrian->status = 'selesai';
        $antrian->save();

        return response()->json(['success' => true]);
    }
    public function getDokter($poliId)
{
    $dokters = User::where('akses_poli_id', $poliId)->get();
    return response()->json($dokters);
}

public function getJadwal($dokterId)
{
    $jadwal = JadwalDokter::where('dokter_id', $dokterId)->get();
    return response()->json($jadwal);
}
}
