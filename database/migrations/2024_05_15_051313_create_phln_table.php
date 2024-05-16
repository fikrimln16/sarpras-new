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
        Schema::create('phln', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek', 255);
            $table->string('singkatan_proyek', 100)->nullable();
            $table->string('pemberi_pinjaman', 255)->nullable();
            $table->string('jenis_kontrak', 255)->nullable();
            $table->date('sign_date')->nullable();
            $table->date('closed_date')->nullable();
            $table->float('pagu_loan')->nullable();
            $table->string('mata_uang_pagu_loan', 50)->nullable();
            $table->float('pagu_goi')->nullable();
            $table->string('mata_uang_pagu_goi', 50)->nullable();
            $table->string('mata_uang_valas', 50)->nullable();
            $table->string('kode_loan', 50)->nullable()->nullable();
            $table->string('no_registrasi', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phln');
    }
};