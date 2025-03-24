<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('antrians', function (Blueprint $table) {
            // Tambahkan kolom poli_id jika belum ada
            if (!Schema::hasColumn('antrians', 'poli_id')) {
                $table->unsignedBigInteger('poli_id')->nullable();
            }

            // Pastikan foreign key belum ada sebelum ditambahkan
            $table->foreign('poli_id')
                  ->references('id')->on('polis')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropForeign(['poli_id']);
            $table->dropColumn('poli_id');
        });
    }
};
