
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian_ekskul', function (Blueprint $table) {
            $table->id();

            $table->foreignId('anggota_ekskul_id')
                ->constrained('anggota_ekskul')
                ->cascadeOnDelete();

            $table->foreignId('pembina_id')
                ->constrained('user')
                ->cascadeOnDelete();

            $table->string('semester', 20)->default('Ganjil');
            $table->string('tahun_ajaran', 20);

            $table->unsignedTinyInteger('kehadiran');
            $table->unsignedTinyInteger('keaktifan');
            $table->unsignedTinyInteger('kedisiplinan');
            $table->unsignedTinyInteger('tanggung_jawab');
            $table->unsignedTinyInteger('keterampilan');

            $table->decimal('nilai_akhir', 5, 2);

            $table->timestamps();

            $table->unique(
                ['anggota_ekskul_id', 'semester', 'tahun_ajaran'],
                'penilaian_anggota_periode_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_ekskul');
    }
};
