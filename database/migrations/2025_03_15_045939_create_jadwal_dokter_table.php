<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id')->constrained('users')->onDelete('cascade');
            $table->string('hari'); // Senin, Selasa, dll.
            $table->boolean('status')->default(false); // true = ON, false = OFF
            $table->timestamps();

            // Kombinasi dokter_id dan hari harus unik
            $table->unique(['dokter_id', 'hari']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_dokter');
    }
}
