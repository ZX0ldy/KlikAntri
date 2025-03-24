<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Poli;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function getDoctorsByPoli($poliId)
    {
        $doctors = User::where('akses_poli_id', $poliId)
                      ->where('role_id', 2) // role_id 2 untuk dokter
                      ->get(['id', 'name', 'foto']);

        return response()->json($doctors);
    }

    public function getDoctorSchedule($doctorId)
    {
        $doctor = User::with('poli')->find($doctorId);

        if (!$doctor) {
            return response()->json(['error' => 'Dokter tidak ditemukan'], 404);
        }

        // Jadwal default dokter
        $schedule = [
            'senin' => ['14:00-16:00'],
            'selasa' => ['14:00-16:00'],
            'rabu' => ['14:00-16:00'],
            'kamis' => ['14:00-16:00'],
            'jumat' => [],
            'sabtu' => ['14:00-16:00']
        ];

        return response()->json([
            'doctor' => $doctor,
            'schedule' => $schedule
        ]);
    }
}
