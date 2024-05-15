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
        Schema::create('sumber_daya_manusia', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_SDM', 255)->nullable();
            $table->string('jenis_kelamin', 50)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama_ibu_kandung', 255)->nullable();
            $table->string('NIK', 16)->nullable();
            $table->unsignedBigInteger('NIYNIGK')->nullable();
            $table->unsignedBigInteger('NUPTK')->nullable();
            $table->unsignedBigInteger('NIDN')->nullable();
            $table->unsignedBigInteger('NSDMI')->nullable();
            $table->string('status_perkawinan', 50)->nullable();
            $table->string('nomor_telepon_rumah', 14)->nullable();
            $table->unsignedBigInteger('nomor_hp')->nullable();
            $table->string('email', 255)->nullable();
            $table->unsignedBigInteger('NIP')->nullable();
            $table->date('TMT_PNS')->nullable();
            $table->string('nama_suami_istri', 255)->nullable();
            $table->string('NIP_suami_istri', 255)->nullable();
            $table->unsignedBigInteger('SK_CPNS')->nullable();
            $table->date('tanggal_SK_CPNS')->nullable();
            $table->unsignedBigInteger('SK_pengangkatan')->nullable();
            $table->date('TMT_SK_pengangkatan')->nullable();
            $table->unsignedBigInteger('NPWP')->nullable();
            $table->string('nama_wajib_pajak', 50)->nullable();
            $table->string('status_data', 50)->nullable();
            $table->string('jenis_registrasi', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_daya_manusia');
    }
};