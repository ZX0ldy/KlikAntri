<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter');
            $table->foreignId('poli_id')->constrained('polis')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
