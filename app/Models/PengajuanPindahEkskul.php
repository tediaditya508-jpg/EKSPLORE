<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanPindahEkskul extends Model
{
    protected $table = 'pengajuan_pindah_ekskul';

    protected $fillable = [
        'siswa_id',
        'ekskul_asal_id',
        'ekskul_tujuan_id',
        'alasan',
        'status',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function ekskulAsal(): BelongsTo
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekskul_asal_id'
        );
    }

    public function ekskulTujuan(): BelongsTo
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekskul_tujuan_id'
        );
    }
}