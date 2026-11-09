<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('status_siswa', 20)
                ->default('aktif');
        });

        Schema::create('kenaikan_kelas_logs', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran', 9)->unique();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedInteger('jumlah_naik')->default(0);
            $table->unsignedInteger('jumlah_alumni')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kenaikan_kelas_logs');

        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('status_siswa');
        });
    }
};