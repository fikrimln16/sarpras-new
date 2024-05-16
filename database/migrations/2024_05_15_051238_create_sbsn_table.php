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
            $table->string('jenis_kontrak', 100)->nullable();
            $table->integer('tahun_start')->nullable();
            $table->integer('tahun_end')->nullable();
            $table->date('tgl_mulai_kontrak')->nullable();
            $table->date('tgl_selesai_kontrak')->nullable();
            $table->string('penanda_aset', 5)->nullable();
            $table->unsignedBigInteger('id_data_lokasi_kampus');
            $table->foreign('id_data_lokasi_kampus')->references('id')->on('data_lokasi_kampus')->onDelete('cascade');
            $table->integer('nilai_dpp')->nullable();
            $table->string('no_registrasi', 20)->nullable();
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