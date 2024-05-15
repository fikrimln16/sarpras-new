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
            $table->string('nama_sarana', 255);
            $table->string('kategori', 255);
            $table->string('jenis_sarana', 255);
            $table->string('spesifikasi', 255);
            $table->date('tanggal_perolehan');
            $table->integer('tahun_produksi');
            $table->float('nilai_perolehan');
            $table->float('nilai_buku');
            $table->string('penggunaan', 255);
            $table->string('kondisi', 255);
            $table->string('tanggal_hapus_buku', 255);
            $table->string('status', 255);
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