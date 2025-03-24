<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntriansTable extends Migration
{
    public function up()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jadwal')->nullable();
            $table->string('nama_pasien');

            $table->foreign('doctor_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('antrians');
    }
}
