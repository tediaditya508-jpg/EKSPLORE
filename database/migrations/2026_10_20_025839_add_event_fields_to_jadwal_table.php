
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->string('jenis', 20)
                ->default('rutin');

            $table->string('nama_event')
                ->nullable();

            $table->date('tanggal_event')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn([
                'jenis',
                'nama_event',
                'tanggal_event',
            ]);
        });
    }
};
