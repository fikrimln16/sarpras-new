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
        Schema::create('sbsn', function (Blueprint $table) {
            $table->id('uuid_sbsn');  // Using 'id' method for auto-incrementing primary key
            $table->string('nama_proyek', 255);
            $table->string('jenis_kontrak', 100);
            $table->integer('tahun_start');
            $table->integer('tahun_end');
            $table->date('tgl_mulai_kontrak');
            $table->date('tgl_selesai_kontrak');
            $table->string('penanda_aset', 5);
            $table->string('perguruan_tinggi', 26);
            $table->integer('nilai_dpp');
            $table->string('no_registrasi', 20);
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sbsn');
    }
};