<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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

    /**
     * URL dokumentasi prestasi.
     * Mendukung tautan lama (http/www) dan file gambar yang diunggah ke storage.
     */
    public function getDokumentasiUrlAttribute(): ?string
    {
        $dokumentasi = trim((string) $this->dokumentasi);

        if ($dokumentasi === '') {
            return null;
        }

        if (preg_match('/^https?:\/\//i', $dokumentasi)) {
            return $dokumentasi;
        }

        if (preg_match('/^www\./i', $dokumentasi)) {
            return 'https://' . $dokumentasi;
        }

        if (Storage::disk('public')->exists($dokumentasi)) {
            return Storage::disk('public')->url($dokumentasi);
        }

        return null;
    }

    /**
     * Apakah dokumentasi berupa file gambar yang diunggah (bukan tautan luar).
     */
    public function getDokumentasiGambarAttribute(): bool
    {
        $dokumentasi = trim((string) $this->dokumentasi);

        return $this->dokumentasi_url !== null
            && !preg_match('/^(https?:\/\/|www\.)/i', $dokumentasi)
            && (bool) preg_match('/\.(jpe?g|png|webp|gif)$/i', $dokumentasi);
    }

    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekskul_id'
        );
    }
}