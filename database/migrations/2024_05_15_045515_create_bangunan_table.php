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
        Schema::create('bangunan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_paket', 50)->nullable();
            $table->unsignedInteger('KD_SATKER_TANAH')->nullable();
            $table->string('NM_SATKER_TANAH', 255)->nullable();
            $table->unsignedInteger('KD_BRG_TANAH')->nullable();
            $table->string('NM_BRG_TANAH', 255)->nullable();
            $table->unsignedInteger('NUP_BRG_TANAH')->nullable();
            $table->date('TGL_SK_PEMAKAIAN')->nullable();
            $table->unsignedInteger('kapasitas')->nullable();
            $table->string('tanggal_hapus_buku', 20)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('kategori', 50)->nullable();


            $table->unsignedBigInteger('id_prasarana');
            $table->unsignedBigInteger('id_tanah');
            $table->foreign('id_prasarana')->references('id')->on('prasarana')->onDelete('cascade');
            $table->foreign('id_tanah')->references('id')->on('tanah')->onDelete('cascade');

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