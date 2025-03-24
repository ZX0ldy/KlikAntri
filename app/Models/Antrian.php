<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_antrian',
        'poli_id',
        'status',
        'doctor_id',
        'tanggal',
        'jadwal',
        'nama_pasien',
        'needs_audio',
        'audio_played',
        'audio_play_time'
    ];

    protected $casts = [
        'needs_audio' => 'boolean',
        'audio_played' => 'boolean',
        'audio_play_time' => 'datetime',
        'tanggal' => 'date',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
