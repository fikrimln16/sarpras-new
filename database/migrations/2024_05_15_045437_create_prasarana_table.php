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
            $table->string('nama_prasarana', 255);
            $table->string('jenis_prasarana', 255);
            $table->string('alamat', 255);
            $table->string('lintang', 100);
            $table->string('bujur', 100);
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('luas_bangunan');
            $table->integer('luas_tanah');
            $table->integer('jumlah_lantai');
            $table->string('objek_infrastruktur', 100)->nullable();
            $table->string('bmn_satker', 255);
            $table->string('bmn_kode_barang', 255);
            $table->integer('bmn_nup');
            $table->date('tanggal_perolehan');
            $table->integer('nilai_perolehan');
            $table->integer('nilai_buku');
            $table->string('merk', 255)->nullable();
            $table->string('KD_KAB_KOTA', 255);
            $table->string('NM_KAB_KOTA', 255);
            $table->string('KD_PROV', 255);
            $table->string('NM_PROV', 255);
            $table->string('penggunaan', 255);
            $table->string('kondisi', 255);
            $table->string('NO_DOK_KEPEMILIKAN', 255);
            $table->string('DOK_KEPEMILIKAN', 255)->nullable();
            $table->string('JNS_DOK_KEPEMILIKAN', 255);
            $table->integer('KD_SATKER_TANAH');
            $table->string('NM_SATKER_TANAH', 255);
            $table->integer('KD_BRG_TANAH');
            $table->string('NM_BRG_TANAH', 255);
            $table->integer('NUP_BRG_TANAH');
            $table->date('TGL_SK_PEMAKAIAN');
            $table->integer('kapasitas');
            $table->string('tanggal_hapus_buku', 255)->nullable();
            $table->string('keterangan', 255);
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