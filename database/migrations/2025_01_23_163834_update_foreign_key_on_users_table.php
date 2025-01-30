<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key lama (jika ada)
            // $table->dropForeign(['akses_poli_id']);

            // Tambahkan foreign key baru
            $table->foreign('akses_poli_id')
                ->references('id')
                ->on('polis')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Kembalikan ke foreign key lama (opsional)
            // $table->dropForeign(['akses_poli_id']); // Hapus foreign key baru

            $table->foreign('akses_poli_id')
                ->references('id')
                ->on('akses_poli')
                ->onDelete('set null'); // Sesuaikan jika perlu
        });
    }
};
