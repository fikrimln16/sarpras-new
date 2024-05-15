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
            $table->string('singkatan_proyek', 100);
            $table->string('pemberi_pinjaman', 255);
            $table->string('jenis_kontrak', 255);
            $table->date('sign_date');
            $table->date('closed_date');
            $table->float('pagu_loan');
            $table->string('mata_uang_pagu_loan', 50);
            $table->float('pagu_goi');
            $table->string('mata_uang_pagu_goi', 50);
            $table->string('mata_uang_valas', 50);
            $table->string('kode_loan', 50);
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