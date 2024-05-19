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
        Schema::create('bangunan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_paket', 50);
            $table->unsignedInteger('KD_SATKER_TANAH');
            $table->string('NM_SATKER_TANAH', 255);
            $table->unsignedInteger('KD_BRG_TANAH');
            $table->string('NM_BRG_TANAH', 255);
            $table->unsignedInteger('NUP_BRG_TANAH');
            $table->date('TGL_SK_PEMAKAIAN');
            $table->unsignedInteger('kapasitas');
            $table->string('tanggal_hapus_buku', 20)->nullable();
            $table->string('keterangan', 255);
            $table->string('kategori', 50)->nullable();
            
            
            $table->unsignedBigInteger('id_prasarana');
            $table->unsignedBigInteger('id_tanah');
            $table->foreign('id_prasarana')->references('id')->on('prasarana');
            $table->foreign('id_tanah')->references('id')->on('tanah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangunan');
    }
};