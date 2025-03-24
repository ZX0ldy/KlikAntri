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
        Schema::table('polis', function (Blueprint $table) {
            $table->string('prefix', 5)->after('nama_poli'); // Prefix maksimal 5 karakter
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('polis', function (Blueprint $table) {
            //
        });
    }
};
