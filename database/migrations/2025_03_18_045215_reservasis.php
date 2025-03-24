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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poli_id')->constrained('polis');
            $table->string('nomor_antrian');
            $table->date('tanggal');
            $table->string('alasan');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
