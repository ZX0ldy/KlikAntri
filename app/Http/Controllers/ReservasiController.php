<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ReservasiController extends Controller
{
    /**
     * Store a new reservation
     */
    public function store(Request $request)
{
    try {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'poli_id' => 'required|exists:polis,id',
            'tanggal' => 'required|date|date_format:Y-m-d',
            'alasan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Ambil data poli berdasarkan ID
        $poli = Poli::findOrFail($request->poli_id);

        // Cek jumlah reservasi yang sudah ada pada tanggal tersebut
        $totalReservasi = Reservasi::where('poli_id', $request->poli_id)
            ->where('tanggal', $request->tanggal)
            ->count();

        // Cek apakah jumlah reservasi sudah mencapai atau melebihi batas
        if ($totalReservasi >= $poli->limit_reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor antrian poli ini sudah penuh!'
            ], 400);
        }

        // Cek apakah reservasi dilakukan dalam jam operasional
        $currentTime = now()->format('H:i:s');
        if (!empty($poli->jam_buka) && !empty($poli->jam_tutup)) {
            if ($currentTime < $poli->jam_buka || $currentTime > $poli->jam_tutup) {
                return response()->json([
                    'success' => false,
                    'message' => 'Reservasi hanya dapat dilakukan pada jam operasional: ' . $poli->jam_buka . ' - ' . $poli->jam_tutup
                ], 400);
            }
        }

        // Generate nomor antrian
        $nomorAntrian = $this->generateQueueNumber($request->poli_id);

        // Simpan data reservasi
        $reservasi = new Reservasi();
        $reservasi->poli_id = $request->poli_id;
        $reservasi->nomor_antrian = $nomorAntrian;
        $reservasi->tanggal = $request->tanggal;
        $reservasi->alasan = $request->alasan;
        $reservasi->status = 'pending'; // Default status
        $reservasi->save();

        // Log sukses
        Log::info("Created new reservation: {$nomorAntrian} for poli ID {$request->poli_id}");

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat',
            'data' => [
                'id' => $reservasi->id,
                'nomor_antrian' => $nomorAntrian,
                'poli_id' => $reservasi->poli_id,
                'poli_name' => $poli->nama_poli,
                'tanggal' => $reservasi->tanggal,
                'alasan' => $reservasi->alasan,
                'status' => $reservasi->status
            ]
        ], 201);

    } catch (\Exception $e) {
        // Log error
        Log::error("Error creating reservation: " . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Gagal membuat reservasi: ' . $e->getMessage(),
        ], 500);
    }
}


    /**
     * Generate a queue number for a specific poli
     */
    private function generateQueueNumber($poliId)
    {
        // Get poli details
        $poli = Poli::findOrFail($poliId);

        // Generate prefix from poli name (first letter of each word)
        $words = explode(' ', $poli->nama_poli);
        $prefix = '';
        foreach ($words as $word) {
            $prefix .= strtoupper(substr($word, 0, 1));
        }

        // Initial random number between 100-999
        $randomNumber = mt_rand(100, 999);
        $nomorAntrian = $prefix . '-' . $randomNumber;

        // Ensure no duplicates by checking existing numbers
        while (Reservasi::where('nomor_antrian', $nomorAntrian)->exists()) {
            $randomNumber = mt_rand(100, 999);
            $nomorAntrian = $prefix . '-' . $randomNumber;
        }

        return $nomorAntrian;
    }

    /**
     * Check the status of a reservation
     */
    public function checkStatus($id)
    {
        try {
            $reservasi = Reservasi::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $reservasi->id,
                    'nomor_antrian' => $reservasi->nomor_antrian,
                    'status' => $reservasi->status,
                    'tanggal' => $reservasi->tanggal,
                    'poli_name' => $reservasi->poli->nama_poli
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Reservasi tidak ditemukan'
            ], 404);
        }
    }
}
