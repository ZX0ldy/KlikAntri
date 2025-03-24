<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $fillable = [
        'limit_reservasi',
        'jam_buka',
        'jam_tutup',
        'nama_poli',
        'icon_image',
        'prefix',
        'status'
    ];

    // Define relationship with users (dokters)
    public function dokters()
    {
        return $this->hasMany(User::class, 'akses_poli_id');
    }

    public function reservasis()
{
    return $this->hasMany(Reservasi::class, 'poli_id');
}

    // Your existing users relationship
    public function users()
    {
        return $this->hasMany(User::class, 'akses_poli_id');
    }
}
