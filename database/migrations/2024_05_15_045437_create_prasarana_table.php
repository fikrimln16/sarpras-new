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
            $table->integer('luas_bangunan')->nullable();
            $table->integer('luas_tanah')->nullable();
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
            $table->string('JNS_DOK_KEPEMILIKAN', 255)->nullable();
            $table->integer('KD_SATKER_TANAH')->nullable();
            $table->string('NM_SATKER_TANAH', 255)->nullable();
            $table->integer('KD_BRG_TANAH')->nullable();
            $table->string('NM_BRG_TANAH', 255)->nullable();
            $table->integer('NUP_BRG_TANAH')->nullable();
            $table->date('TGL_SK_PEMAKAIAN')->nullable();
            $table->integer('kapasitas')->nullable();
            $table->string('tanggal_hapus_buku', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
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