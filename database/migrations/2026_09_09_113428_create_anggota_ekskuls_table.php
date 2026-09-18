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
    Schema::create('anggota_ekskuls', function (Blueprint $table) {
        $table->id();

        $table->foreignId('siswa_id')
              ->constrained('users')
              ->cascadeOnDelete();

        $table->foreignId('ekskul_id')
              ->constrained('ekstrakurikulers')
              ->cascadeOnDelete();

        $table->date('tanggal_daftar');
        $table->string('status')->default('aktif');

        $table->timestamps();

        $table->unique(['siswa_id', 'ekskul_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_ekskuls');
    }
};
