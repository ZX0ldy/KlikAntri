<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'akses_poli_id',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Pastikan foreign key benar
    }

    // Relasi ke Poli
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'akses_poli_id');
    }

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }

    public function rujukans()
    {
        return $this->hasMany(Rujukan::class, 'dokter_id');
    }

    // Relasi ke jadwal dokter
    public function jadwals()
    {
        return $this->hasMany(JadwalDokter::class, 'dokter_id');
    }

    // Helper method untuk mendapatkan status jadwal berdasarkan hari
    public function getJadwalStatus($hari)
    {
        $jadwal = $this->jadwals()->where('hari', $hari)->first();
        return $jadwal ? $jadwal->status : false;
    }
}
