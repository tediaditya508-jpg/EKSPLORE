<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'ekskul_id',
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