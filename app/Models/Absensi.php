<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\AnggotaEkskul;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = [
        'anggota_id',
        'tanggal',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function anggota(): BelongsTo
    {
        return $this->belongsTo(AnggotaEkskul::class, 'anggota_id');
    }
}