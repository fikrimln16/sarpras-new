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
        Schema::create('penempatan_prasarana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_data_lokasi_kampus');
            $table->unsignedBigInteger('id_prasarana');

            $table->foreign('id_data_lokasi_kampus')->references('id')->on('data_lokasi_kampus')->onDelete('cascade');
            $table->foreign('id_prasarana')->references('id')->on('prasarana')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan_prasarana');
    }
};