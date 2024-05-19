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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruang', 20);
            $table->string('nama_ruangan', 255);
            $table->integer('luas_ruang');
            $table->integer('lantai');
            $table->integer('kapasitas');
            $table->integer('tahun_perolehan');
            $table->string('kelompok_ruangan', 255);
            $table->date('tgl_mulai_kontrak');
            $table->date('tgl_selesai_kontrak')->nullable();
            $table->unsignedBigInteger('id_bangunan');

            $table->foreign('id_bangunan')->references('id')->on('bangunan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};