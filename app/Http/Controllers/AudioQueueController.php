<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AudioQueueController extends Controller
{
    /**
     * API endpoint to mark an audio as played
     */
    public function markAudioPlayed(Request $request)
    {
        $request->validate([
            'antrian_id' => 'required|exists:antrians,id'
        ]);
        
        $antrian = Antrian::find($request->antrian_id);
        $antrian->audio_played = true;
        $antrian->save();
        
        return response()->json(['status' => 'success']);
    }
}