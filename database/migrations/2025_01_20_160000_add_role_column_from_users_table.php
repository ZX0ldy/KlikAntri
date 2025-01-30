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
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('role_id')->nullable()->after('id'); // Menambahkan kolom role_id
        $table->unsignedBigInteger('akses_poli_id')->nullable()->after('role_id'); // Menambahkan kolom akses_poli_id

        // Menambahkan foreign key
        $table->foreign('role_id')->references('id')->on('role')->onDelete('set null');
        $table->foreign('akses_poli_id')->references('id')->on('akses_poli')->onDelete('set null');
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Menghapus foreign key
        $table->dropForeign(['role_id']);
        $table->dropForeign(['akses_poli_id']);

        // Menghapus kolom
        $table->dropColumn(['role_id', 'akses_poli_id']);
    });
}

};
