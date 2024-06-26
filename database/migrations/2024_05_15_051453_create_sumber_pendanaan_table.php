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
        Schema::create('sumber_pendanaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uuid_sbsn')->nullable();
            $table->unsignedBigInteger('id_phln')->nullable(); 
            $table->unsignedBigInteger('id_prasarana')->nullable();
            $table->unsignedBigInteger('id_sarana')->nullable();
            $table->timestamps();

            $table->foreign('uuid_sbsn')->references('uuid_sbsn')->on('sbsn')->onDelete('set null');
            $table->foreign('id_phln')->references('id')->on('phln')->onDelete('set null');
            $table->foreign('id_prasarana')->references('id')->on('prasarana')->onDelete('restrict');
            $table->foreign('id_sarana')->references('id')->on('sarana')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_pendanaan');
    }
};