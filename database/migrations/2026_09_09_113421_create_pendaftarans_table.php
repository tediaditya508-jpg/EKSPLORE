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
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();

        $table->foreignId('siswa_id')
              ->constrained('users')
              ->cascadeOnDelete();

        $table->foreignId('ekskul_id')
              ->constrained('ekstrakurikulers')
              ->cascadeOnDelete();

        $table->string('nama');
        $table->string('kelas');
        $table->string('nis');
        $table->string('no_hp');
        $table->text('alasan')->nullable();

        $table->enum('status', [
            'menunggu',
            'diterima',
            'ditolak'
        ])->default('menunggu');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
