<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'ekskul_id',
        'nama_prestasi',
        'tingkat',
        'tanggal',
        'lokasi',
        'dokumentasi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekskul_id'
        );
    }
}