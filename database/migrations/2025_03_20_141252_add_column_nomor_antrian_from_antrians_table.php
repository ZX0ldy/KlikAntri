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
            // Hapus kolom doctor_id
            $table->dropColumn('nama_pasien');

            // Tambah kolom nomor_antrian dan status
            $table->string('nomor_antrian')->after('id');
            $table->string('status')->default('Menunggu')->after('nomor_antrian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antrians', function (Blueprint $table) {
            // Tambahkan kembali kolom doctor_id
            $table->unsignedBigInteger('nama_pasien')->after('id');

            // Hapus kolom nomor_antrian dan status
            $table->dropColumn(['nomor_antrian', 'status']);
        });
    }
};
