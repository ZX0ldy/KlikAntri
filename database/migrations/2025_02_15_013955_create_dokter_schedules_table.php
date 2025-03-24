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
        Schema::create('dokter_schedules', function (Blueprint $table) {
            $table->id(); // Kolom primary key, auto-increment
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel users (dokter)
            $table->string('hari'); // Hari praktek (contoh: Senin, Selasa, Rabu, dll)
            $table->time('jam_mulai'); // Jam mulai praktek (contoh: 08:00)
            $table->time('jam_selesai'); // Jam selesai praktek (contoh: 16:00)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Jika dokter dihapus, jadwalnya juga dihapus
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter_schedules');
    }
};
