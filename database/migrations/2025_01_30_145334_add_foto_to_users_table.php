<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoToUsersTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom foto setelah kolom phone
            $table->string('foto')->nullable()->after('phone');
        });
    }

    /**
     * Rollback migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom foto jika rollback
            $table->dropColumn('foto');
        });
    }
}
