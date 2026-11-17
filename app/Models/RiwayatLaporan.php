<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatLaporan extends Model
{
    protected $table = 'riwayat_laporan';

    protected $fillable = [
        'admin_id',
        'jenis_laporan',
        'filter',
        'jumlah_data',
    ];

    protected $casts = [
        'filter' => 'array',
        'jumlah_data' => 'integer',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}