<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $fillable = [
        'nama_poli',
        'background_image',
        'icon_image',
        'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'akses_poli_id', 'id');
    }
}