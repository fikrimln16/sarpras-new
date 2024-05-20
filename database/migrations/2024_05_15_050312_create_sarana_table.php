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
        Schema::create('sarana', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sarana', 255)->nullable();
            $table->string('kategori', 255)->nullable();
            $table->string('jenis_sarana', 255)->nullable();
            $table->string('spesifikasi', 255)->nullable();
            $table->date('tanggal_perolehan')->nullable();
            $table->integer('tahun_produksi')->nullable();
            $table->float('nilai_perolehan')->nullable();
            $table->float('nilai_buku')->nullable();
            $table->string('penggunaan', 255)->nullable();
            $table->string('kondisi', 255)->nullable();
            $table->string('tanggal_hapus_buku', 255)->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana');
    }
};