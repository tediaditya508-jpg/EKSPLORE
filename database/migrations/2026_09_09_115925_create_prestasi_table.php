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
    Schema::create('prestasi', function (Blueprint $table) {
        $table->id();

        $table->foreignId('ekskul_id')
              ->constrained('ekstrakurikuler')
              ->cascadeOnDelete();

        $table->string('nama_prestasi');
        $table->string('tingkat')->nullable();
        $table->date('tanggal')->nullable();
        $table->string('lokasi')->nullable();
        $table->string('dokumentasi')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
