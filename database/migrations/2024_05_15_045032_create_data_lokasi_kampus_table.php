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
        Schema::create('data_lokasi_kampus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kampus', 100);
            $table->string('lokasi', 255);
            $table->unsignedInteger('npsn');
            $table->string('alamat', 255);
            $table->string('latitude', 18);
            $table->string('longitude', 22);
            $table->timestamps(); // Optionally add timestamps if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_lokasi_kampus');
    }
};