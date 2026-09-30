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
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->unsignedBigInteger('ekskul_id')
                ->nullable()
                ->after('id');

            $table->foreign('ekskul_id')
                ->references('id')
                ->on('ekstrakurikuler')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->dropForeign(['ekskul_id']);
            $table->dropColumn('ekskul_id');
        });
    }
};