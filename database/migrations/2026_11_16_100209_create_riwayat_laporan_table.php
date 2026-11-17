
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_laporan', function (Blueprint $table) {
            $table->id();

            // Admin yang membuat laporan
            $table->foreignId('admin_id')
                ->constrained('user')
                ->cascadeOnDelete();

            // Jenis laporan yang dibuat
            $table->string('jenis_laporan');

            // Filter yang digunakan saat membuat laporan
            $table->json('filter')->nullable();

            // Jumlah data dalam laporan
            $table->integer('jumlah_data')->default(0);

            // Waktu pembuatan laporan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_laporan');
    }
};
