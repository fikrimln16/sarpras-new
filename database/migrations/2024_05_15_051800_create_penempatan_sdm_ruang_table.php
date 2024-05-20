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
        Schema::create('penempatan_sdm_ruang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sdm');
            $table->unsignedBigInteger('id_ruang');
            $table->date('tanggal_mulai_penempatan')->nullable();
            $table->date('tanggal_selesai_penempatan')->nullable();

            $table->foreign('id_sdm')->references('id')->on('sumber_daya_manusia')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id')->on('ruangan')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan_sdm_ruang');
    }
};