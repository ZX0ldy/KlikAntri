<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('polis', function (Blueprint $table) {
            // Menambahkan kolom limit_reservasi
            $table->integer('limit_reservasi')->default(0)->after('id');

            // Menambahkan kolom jam_buka dan jam_tutup yang bisa null
            $table->time('jam_buka')->nullable()->after('limit_reservasi');
            $table->time('jam_tutup')->nullable()->after('jam_buka');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('polis', function (Blueprint $table) {
            // Menghapus kolom yang telah ditambahkan
            $table->dropColumn(['limit_reservasi', 'jam_buka', 'jam_tutup']);
        });
    }
};
