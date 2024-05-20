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
        Schema::create('penempatan_sarana', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unik', 255)->unique();
            $table->unsignedBigInteger('id_ruang');
            $table->unsignedBigInteger('id_sarana');
            $table->string('penggunaan', 255)->nullable();
            $table->string('kondisi', 255)->nullable();
            $table->string('status', 255)->nullable();
            
            $table->foreign('id_ruang')->references('id')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_sarana')->references('id')->on('sarana')->onDelete('cascade');

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