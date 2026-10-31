<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_pindah_ekskul', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')
                ->constrained('user')
                ->cascadeOnDelete();

            $table->foreignId('ekskul_asal_id')
                ->constrained('ekstrakurikuler')
                ->cascadeOnDelete();

            $table->foreignId('ekskul_tujuan_id')
                ->constrained('ekstrakurikuler')
                ->cascadeOnDelete();

            $table->text('alasan');

            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])
                ->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pindah_ekskul');
    }
};