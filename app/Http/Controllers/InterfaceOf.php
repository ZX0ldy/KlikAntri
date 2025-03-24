<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use App\Models\Antrian;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class InterfaceOf extends Controller
{
    public function index()
    {
        $polis = Poli::where('status', 2)->get();
        return view('landingof', compact('polis'));
    }

    public function getAntrian(Request $request)
    {
        // Get today's date
        $today = Carbon::today();

        // Get antrians with "Memanggil" status first, then "Dipanggil" for today only
        $antrians = Antrian::whereIn('status', ['Memanggil', 'Dipanggil'])
                          ->whereDate('created_at', $today)
                          ->orderByRaw("CASE WHEN status = 'Memanggil' THEN 0 ELSE 1 END")
                          ->orderBy('created_at', 'asc')
                          ->get();

        $polis = Poli::where('status', 2)->get();

        // Log for debugging
        \Log::info("Found " . $antrians->count() . " antrians for display");

        // Add call count if not present
        foreach ($antrians as $antrian) {
            if (!isset($antrian->jumlah_panggilan)) {
                $antrian->jumlah_panggilan = 0;
            }
        }

        // Return JSON if requested via AJAX
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'antrians' => $antrians,
                'polis' => $polis
            ]);
        }

        return view('daftarantri', compact('antrians', 'polis'));
    }

    public function ambilNomor(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'poli_id' => 'required|exists:polis,id',
            ]);

            $poli = Poli::findOrFail($request->poli_id);

            // Generate nomor antrian with prefix from poli name
            $prefix = strtoupper(collect(explode(' ', $poli->nama_poli))->map(fn($word) => substr($word, 0, 1))->join(''));
            $randomNumber = mt_rand(100, 999);
            $nomorAntrian = $prefix . '-' . $randomNumber;

            // Ensure no duplicates
            while (Antrian::where('nomor_antrian', $nomorAntrian)->exists()) {
                $randomNumber = mt_rand(100, 999);
                $nomorAntrian = $prefix . '-' . $randomNumber;
            }

            // Create with "Memanggil" status
            $antrian = new Antrian();
            $antrian->nomor_antrian = $nomorAntrian;
            $antrian->poli_id = $request->poli_id;
            $antrian->status = 'Memanggil'; // Set to "Memanggil" immediately
            // $antrian->jumlah_panggilan = 0; // Initialize call count
            // $antrian->tanggal = Carbon::today();
            $antrian->save();

            // Log creation
            \Log::info("Created new antrian: {$nomorAntrian} for poli ID {$request->poli_id} with status Memanggil");

            // Print receipt
            try {
                $connector = new WindowsPrintConnector("Klikantri");
                $printer = new Printer($connector);

                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("KlikAntri+\n");
                $printer->text("Jl. Tanimbar No.22\n");
                $printer->text("Telp: +62 8214 3695 005\n");
                $printer->text("-----------------------------\n");

                // Print date
                $printer->setTextSize(1, 1);
                $printer->text("TANGGAL: " . date('d F Y') . "\n");
                $printer->text("-----------------------------\n");

                // Print queue number
                $printer->setTextSize(2, 2);
                $printer->text("NOMOR ANTRIAN:\n");
                $printer->setTextSize(4, 4);
                $printer->text("$nomorAntrian\n");

                // Print poli name
                $printer->setTextSize(2, 2);
                $printer->text(" $poli->nama_poli\n");

                // Closing message
                $printer->setTextSize(1, 1);
                $printer->text("-----------------------------\n");
                $printer->text("Tiket hanya berlaku pada  \n");
                $printer->text("hari pengambilan\n");
                $printer->text("Terima kasih atas kunjungan Anda\n");
                $printer->text("-----------------------------\n");

                $printer->cut();
                $printer->close();
            } catch (\Exception $e) {
                Log::error("Printer error: " . $e->getMessage());
            }

            // Return with success message
            return redirect()->back()->with([
                'success' => "Nomor antrian Anda: $nomorAntrian",
                'antrian_data' => [
                    'nomor' => $nomorAntrian,
                    'poli' => $poli->nama_poli,
                    'id' => $antrian->id
                ]
            ]);
        } catch (\Exception $e) {
            Log::error("Error in ambilNomor: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function incrementCallCount(Request $request)
{
    try {
        $request->validate([
            'antrian_id' => 'required|exists:antrians,id'
        ]);

        $antrian = Antrian::find($request->antrian_id);

        // Initialize jumlah_panggilan if it's null
        if ($antrian->jumlah_panggilan === null) {
            $antrian->jumlah_panggilan = 0;
        }

        // Increment the call count
        $antrian->jumlah_panggilan += 1;
        $antrian->save();

        \Log::info("Incremented call count for antrian {$antrian->nomor_antrian} to {$antrian->jumlah_panggilan}");

        return response()->json([
            'status' => 'success',
            'call_count' => $antrian->jumlah_panggilan
        ]);
    } catch (\Exception $e) {
        \Log::error("Error incrementing call count: " . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}

    public function markAntrianAsCalled(Request $request)
    {
        try {
            $request->validate([
                'antrian_id' => 'required|exists:antrians,id'
            ]);

            $antrian = Antrian::find($request->antrian_id);
            $antrian->status = 'Dipanggil';
            $antrian->save();

            \Log::info("Marked antrian {$antrian->nomor_antrian} as Dipanggil");

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            \Log::error("Error marking antrian as called: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
