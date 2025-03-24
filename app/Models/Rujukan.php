<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    protected $fillable = [
        'antrian_id', // Ubah dari nomor_pasien ke antrian_id
        'poli_tujuan',
        'keterangan', // Tambahkan ini untuk mencatat keterangan rujukan
        'status',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function poliTujuan()
    {
        return $this->belongsTo(Poli::class, 'poli_tujuan');
    }
}
