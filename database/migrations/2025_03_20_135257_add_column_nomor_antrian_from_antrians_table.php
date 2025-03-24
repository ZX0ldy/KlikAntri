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
        Schema::table('antrians', function (Blueprint $table) {
            $table->string('nomor_antrian')->after('doctor_id');
            $table->string('status')->after('nomor_antrian');

            $table->dropColumn(['nama_pasien', 'tanggal', 'jadwal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropColumn(['nomor_antrian', 'status']);

            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('jadwal');
        });
    }
};
