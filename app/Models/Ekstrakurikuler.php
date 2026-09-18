<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'nama_ekskul',
        'deskripsi',
        'pembina_id',
        'jadwal',
        'jam',
        'lokasi',
        'gambar',
        'kuota',
        'persyaratan',
    ];

    public function pembina(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pembina_id');
    }

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'ekskul_id');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(AnggotaEkskul::class, 'ekskul_id');
    }

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'ekskul_id');
    }

    public function prestasi(): HasMany
    {
        return $this->hasMany(Prestasi::class, 'ekskul_id');
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class, 'ekskul_id');
    }
}