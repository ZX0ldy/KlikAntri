<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'poli_id',
        'nomor_antrian',
        'tanggal',
        'alasan',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the poli that this reservation belongs to.
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
