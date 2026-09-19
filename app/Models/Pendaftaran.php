<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    protected $fillable = [
        'siswa_id',
        'ekskul_id',
        'nama',
        'kelas',
        'nis',
        'no_hp',
        'alasan',
        'status',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP KE SISWA
    |--------------------------------------------------------------------------
    */

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP KE EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function ekstrakurikuler()
    {
        return $this->belongsTo(
            Ekstrakurikuler::class,
            'ekskul_id'
        );
    }
}