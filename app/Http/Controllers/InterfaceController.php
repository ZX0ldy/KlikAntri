<?php
namespace App\Http\Controllers;
use App\Models\Poli;
use App\Models\User;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\DokterSchedule;
use Illuminate\Http\Request;
class InterfaceController extends Controller
{
    public function index()
{
    // Ambil data poli dengan status 2 dan hitung jumlah reservasi hari ini
    $polis = Poli::where('status', 2)
    ->withCount(['reservasis' => function ($query) {
        $query->whereDate('tanggal', today());
    }])
    ->get();
    // Tambahkan perhitungan kuota tersisa untuk setiap poli
    foreach ($polis as $poli) {
        $poli->kuota_tersisa = max(0, $poli->limit_reservasi - $poli->reservasis_count);
    }

    // Ambil dokter dengan jadwalnya dalam satu query
    $dokters = Poli::with('dokters')->get();

    // Ambil semua user yang berperan sebagai dokter (role_id = 2)
    $dokterIds = User::where('role_id', 2)->pluck('id');

    // Cek apakah ada dokter sebelum mengambil jadwal
    $dokterSchedules = collect(); // Default sebagai koleksi kosong

    if ($dokterIds->isNotEmpty()) {
        $dokterSchedules = JadwalDokter::whereIn('dokter_id', $dokterIds)->get();
    }

    // Menyusun data dokter dalam setiap poli
    foreach ($polis as $poli) {
        $poli->dokters = User::where('role_id', 3)
            ->where('akses_poli_id', $poli->id)
            ->get();

        // Menyusun jadwal untuk setiap dokter dalam poli ini
        foreach ($poli->dokters as $dokter) {
            $dokter->schedules = $dokterSchedules->where('dokter_id', $dokter->id)->values();
        }
    }

    return view('landingpage', compact('polis', 'dokters'));
}


    public function getDokterByPoli($poliId)
    {
        // Ambil dokter berdasarkan poli_id dengan jadwalnya
        $dokters = Dokter::where('poli_id', $poliId)
            ->with('jadwals')
            ->get();

        return response()->json($dokters);
    }
}
