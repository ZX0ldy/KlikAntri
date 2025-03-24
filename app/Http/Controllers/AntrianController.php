<?php
namespace App\Http\Controllers;
use App\Models\Antrian;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AntrianController extends Controller
{
    // Menampilkan halaman landing page untuk antrean
    public function index()
    {
        $polis = Poli::where('status', 2)->get();
        return view('landingpage', compact('polis'));
    }

    // Ambil daftar dokter berdasarkan Poli yang dipilih
    public function getDokterByPoli($poliId)
    {
        $dokters = Dokter::where('poli_id', $poliId)->get();
        return response()->json($dokters);
    }

    // Ambil jadwal dokter berdasarkan dokter yang dipilih
    public function getJadwalByDokter($dokterId)
    {
        $jadwals = JadwalDokter::where('dokter_id', $dokterId)->get();
        return response()->json($jadwals);
    }

    // Proses pengambilan nomor antrean
    public function ambilNomorAntrian(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:100',
            'poli_id' => 'required|exists:polis,id',
            'dokter_id' => 'required|exists:dokters,id',
            'jadwal_id' => 'required|exists:jadwal_dokters,id'
        ]);

        DB::beginTransaction();
        try {
            // Ambil data poli
            $poli = Poli::findOrFail($request->poli_id);

            // Cari nomor antrean terakhir
            $lastAntrian = Antrian::where('poli_id', $request->poli_id)
                ->whereDate('tanggal', now()->toDateString()) // Cek antrean hanya untuk hari ini
                ->orderBy('nomor_antrian', 'desc')
                ->first();

            $nomorUrut = $lastAntrian ? intval(substr($lastAntrian->nomor_antrian, strlen($poli->prefix))) + 1 : 1;
            $nomorAntrian = $poli->prefix . str_pad($nomorUrut, 2, '0', STR_PAD_LEFT);

            // Cek apakah ini antrian pertama untuk poli ini hari ini
            $isFirstAntrian = !$lastAntrian;

            // Simpan antrean
            $antrian = Antrian::create([
                'nama_pasien' => $request->nama_pasien,
                'poli_id' => $request->poli_id,
                'doctor_id' => $request->dokter_id,
                'jadwal_id' => $request->jadwal_id,
                'nomor_antrian' => $nomorAntrian,
                'status' => $isFirstAntrian ? 'dipanggil' : 'menunggu', // Otomatis dipanggil jika pertama
                'jumlah_panggilan' => $isFirstAntrian ? 3 : 0, // Set 3x panggilan jika pertama
                'tanggal' => now()->toDateString()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'nomor_antrian' => $nomorAntrian,
                'poli' => $poli->nama_poli,
                'is_first' => $isFirstAntrian,
                'message' => 'Nomor antrian berhasil diambil.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil nomor antrian: ' . $e->getMessage()
            ], 500);
        }
    }

    // Menampilkan display antrian
    public function display()
    {
        $antrians = Antrian::with('poli')
                   ->whereIn('status', ['dipanggil', 'dilayani'])
                   ->whereDate('tanggal', Carbon::today())
                   ->orderBy('updated_at', 'desc')
                   ->take(10)
                   ->get();

        return view('antrian.display', compact('antrians'));
    }

    // API untuk refresh data display
    public function getDisplayData()
    {
        $antrians = Antrian::with(['poli', 'dokter'])
                   ->whereIn('status', ['dipanggil', 'dilayani'])
                   ->whereDate('tanggal', Carbon::today())
                   ->orderBy('updated_at', 'desc')
                   ->take(10)
                   ->get();

        return response()->json([
            'antrians' => $antrians
        ]);
    }

    // Method untuk mendapatkan daftar antrian untuk nomor loket offline
    public function daftarAntrian()
    {
        $polis = Poli::where('status', 2)->get();
        return view('antrian.index', compact('polis'));
    }

    // Proses pengambilan nomor antrian offline (tanpa pilih dokter)
    public function ambilNomor(Request $request)
    {
        $request->validate([
            'poli_id' => 'required|exists:polis,id',
        ]);

        DB::beginTransaction();
        try {
            // Ambil data poli
            $poli = Poli::findOrFail($request->poli_id);

            // Cari nomor antrean terakhir
            $lastAntrian = Antrian::where('poli_id', $request->poli_id)
                ->whereDate('tanggal', now()->toDateString())
                ->orderBy('nomor_antrian', 'desc')
                ->first();

            $nomorUrut = $lastAntrian ? intval(substr($lastAntrian->nomor_antrian, strlen($poli->prefix))) + 1 : 1;
            $nomorAntrian = $poli->prefix . str_pad($nomorUrut, 2, '0', STR_PAD_LEFT);

            // Cek apakah ini antrian pertama untuk poli ini hari ini
            $isFirstAntrian = !$lastAntrian;

            // Simpan antrean
            $antrian = Antrian::create([
                'nama_pasien' => 'Pasien Offline', // Default untuk antrian offline
                'poli_id' => $request->poli_id,
                'doctor_id' => null, // Tidak perlu pilih dokter
                'jadwal_id' => null, // Tidak perlu pilih jadwal
                'nomor_antrian' => $nomorAntrian,
                'status' => $isFirstAntrian ? 'dipanggil' : 'menunggu', // Otomatis dipanggil jika pertama
                'jumlah_panggilan' => $isFirstAntrian ? 3 : 0, // Set 3x panggilan jika pertama
                'tanggal' => now()->toDateString()
            ]);

            DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'nomor_antrian' => $nomorAntrian,
                    'poli' => $poli->nama_poli,
                    'is_first' => $isFirstAntrian
                ]);
            }

            return redirect()->back()->with([
                'success' => true,
                'nomor_antrian' => $nomorAntrian,
                'poli' => $poli->nama_poli,
                'is_first' => $isFirstAntrian
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat mengambil nomor antrian: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengambil nomor antrian');
        }
    }
}
