<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->boolean('needs_audio')->default(false);
            $table->boolean('audio_played')->default(false);
            $table->timestamp('audio_play_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropColumn(['needs_audio', 'audio_played', 'audio_play_time']);
        });
    }
};
