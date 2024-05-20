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
        Schema::create('alat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unik', 255)->unique();
            
            $table->unsignedBigInteger('id_sarana');
            $table->foreign('id_sarana')->references('id')->on('sarana')->onDelete('cascade');
            
            $table->string('penggunaan', 255)->nullable();
            $table->string('kondisi', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};