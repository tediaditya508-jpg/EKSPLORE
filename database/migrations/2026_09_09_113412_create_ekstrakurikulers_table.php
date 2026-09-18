<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();

            $table->string('nama_ekskul');
            $table->text('deskripsi')->nullable();

            $table->foreignId('pembina_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->string('jadwal')->nullable();
            $table->string('jam')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('gambar')->nullable();

            $table->integer('kuota')->default(30);
            $table->text('persyaratan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};