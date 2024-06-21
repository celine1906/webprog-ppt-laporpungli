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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id('id_aduan');
            $table->unsignedBigInteger('user_id');
            $table->string('alamat_kejadian');
            $table->date('tanggal_kejadian');
            $table->text('judul');
            $table->longtext('pesan');
            $table->string('bukti_kejadian');
            $table->string('video_kejadian');
            $table->string('status')->default('pending');
            $table->text('komentar')->nullable();
            $table->string('bukti_solved')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
