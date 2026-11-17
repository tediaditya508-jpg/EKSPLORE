
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'pgsql') {
            DB::statement("
                ALTER TABLE riwayat_laporan
                ALTER COLUMN filter TYPE TEXT
                USING filter::text
            ");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'pgsql') {
            DB::statement("
                ALTER TABLE riwayat_laporan
                ALTER COLUMN filter TYPE JSON
                USING filter::json
            ");
        }
    }
};
