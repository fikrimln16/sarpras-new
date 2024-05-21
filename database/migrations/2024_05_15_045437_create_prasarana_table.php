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
        Schema::create('prasarana', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prasarana', 255)->nullable();
            $table->string('jenis_prasarana', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('lintang', 100)->nullable();
            $table->string('bujur', 100)->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
            $table->integer('luas')->nullable();
            $table->integer('jumlah_lantai')->nullable();
            $table->string('objek_infrastruktur', 100)->nullable();
            $table->string('bmn_satker', 255)->nullable();
            $table->string('bmn_kode_barang', 255)->nullable();
            $table->integer('bmn_nup')->nullable();
            $table->date('tanggal_perolehan')->nullable();
            $table->integer('nilai_perolehan')->nullable();
            $table->integer('nilai_buku')->nullable();
            $table->string('merk', 255)->nullable();
            $table->string('KD_KAB_KOTA', 255)->nullable();
            $table->string('NM_KAB_KOTA', 255)->nullable();
            $table->string('KD_PROV', 255)->nullable();
            $table->string('NM_PROV', 255)->nullable();
            $table->string('penggunaan', 255)->nullable();
            $table->string('kondisi', 255)->nullable();
            $table->string('NO_DOK_KEPEMILIKAN', 255)->nullable();
            $table->string('DOK_KEPEMILIKAN', 255)->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prasarana');
    }
};