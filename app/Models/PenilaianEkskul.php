<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenilaianEkskul extends Model
{
    protected $table = 'penilaian_ekskul';

    protected $fillable = [
        'anggota_ekskul_id',
        'pembina_id',
        'semester',
        'tahun_ajaran',
        'kehadiran',
        'keaktifan',
        'kedisiplinan',
        'tanggung_jawab',
        'keterampilan',
        'nilai_akhir',
    ];

    protected function casts(): array
    {
        return [
            'kehadiran' => 'integer',
            'keaktifan' => 'integer',
            'kedisiplinan' => 'integer',
            'tanggung_jawab' => 'integer',
            'keterampilan' => 'integer',
            'nilai_akhir' => 'decimal:2',
        ];
    }

    public function anggotaEkskul(): BelongsTo
    {
        return $this->belongsTo(
            AnggotaEkskul::class,
            'anggota_ekskul_id'
        );
    }

    public function pembina(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'pembina_id'
        );
    }
}
