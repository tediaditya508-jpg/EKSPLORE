
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_siswa', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admin_id')
                ->constrained('user')
                ->cascadeOnDelete();

            $table->foreignId('siswa_id')
                ->constrained('user')
                ->cascadeOnDelete();

            $table->string('judul');
            $table->text('pesan');
            $table->string('status')->default('Belum Ditinjau');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_siswa');
    }
};
