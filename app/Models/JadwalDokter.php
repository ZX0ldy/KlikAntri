<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    protected $table = 'jadwal_dokter';

    protected $fillable = [
        'dokter_id',
        'hari',
        'status'
    ];

    // Relasi ke User (dokter)
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}
