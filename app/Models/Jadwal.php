<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    protected $fillable = [
        'ekskul_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
    ];

    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekskul_id'
        );
    }
}