<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoliSeeder extends Seeder
{
    public function run()
    {
        Poli::create([
            'nama_poli' => 'Poli Umum',
            'icon_image' => 'path/to/icon.png',
            'status' => 1,
        ]);

        Poli::create([
            'nama_poli' => 'Poli Gigi',
            'icon_image' => 'path/to/icon.png',
            'status' => 1,
        ]);
    }
}
