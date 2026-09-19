<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nama',
        'email',
        'password',
        'google_id',
        'nis',
        'kelas',
        'no_hp',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER YANG DIBINA
    |--------------------------------------------------------------------------
    */

    public function ekstrakurikulerYangDibina(): HasMany
    {
        return $this->hasMany(
            Ekstrakurikuler::class,
            'pembina_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PENDAFTARAN EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(
            Pendaftaran::class,
            'siswa_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ANGGOTA EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function anggotaEkskul(): HasMany
    {
        return $this->hasMany(
            AnggotaEkskul::class,
            'siswa_id'
        );
    }
}