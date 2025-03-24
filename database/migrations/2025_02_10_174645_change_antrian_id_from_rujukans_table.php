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
        Schema::table('rujukans', function (Blueprint $table) {
            // Hapus foreign key constraint sebelum menghapus kolom
            $table->dropForeign(['antrian_id']); // Menghapus constraint foreign key

            // Hapus kolom antrian_id
            $table->dropColumn('antrian_id');

            // Buat kolom baru 'antrian' dengan tipe varchar(255)
            $table->string('antrian', 255)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rujukans', function (Blueprint $table) {
            // Hapus kolom antrian
            $table->dropColumn('antrian');

            // Kembalikan kolom antrian_id dengan tipe yang lama
            $table->unsignedBigInteger('antrian_id')->after('id');

            // Menambahkan foreign key constraint
            $table->foreign('antrian_id')->references('id')->on('antrians')->onDelete('cascade');
        });
    }
};
