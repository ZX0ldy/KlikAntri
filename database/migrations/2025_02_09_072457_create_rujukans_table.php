<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRujukansTable extends Migration
{
    public function up()
    {
        Schema::create('rujukans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('antrian_id')->constrained('antrians');
            $table->foreignId('poli_tujuan')->constrained('polis');
            $table->text('keterangan')->nullable();
            $table->integer('status')->default(0); // 0: baru, 1: diproses, 2: selesai
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rujukans');
    }
}
