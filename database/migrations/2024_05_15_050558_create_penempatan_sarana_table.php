<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penempatan_sarana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ruang')->nullable();
            $table->unsignedBigInteger('id_sarana')->nullable();
            $table->unsignedBigInteger('id_alat')->nullable();

            $table->foreign('id_ruang')->references('id')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_sarana')->references('id')->on('sarana')->onDelete('cascade');
            $table->foreign('id_alat')->references('id')->on('alat')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan_sarana');
    }
};