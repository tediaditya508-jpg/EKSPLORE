<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\AnggotaEkskul;
use Illuminate\Support\Facades\Auth;

class EkstrakurikulerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN SISWA
    |--------------------------------------------------------------------------
    */

    public function index()
{
    $ekskul = Ekstrakurikuler::latest()->get();

    $siswa = Auth::user();

    $anggotaAktif = collect();

    $jumlahEkskulAktif = 0;

    if ($siswa && $siswa->role === 'siswa') {
        $anggotaAktif = AnggotaEkskul::where('siswa_id', $siswa->id)
            ->where('status', 'aktif')
            ->pluck('ekskul_id');

        $jumlahEkskulAktif = $anggotaAktif->count();
    }

    return view('ekskul.index', compact(
        'ekskul',
        'anggotaAktif',
        'jumlahEkskulAktif'
    ));
}


    public function show($id)
    {
        $ekskul = Ekstrakurikuler::with([
            'jadwals',
            'prestasi',
            'galeri'
        ])->findOrFail($id);

        return view('ekskul.show', compact('ekskul'));
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN PEMBINA
    |--------------------------------------------------------------------------
    */

    public function pembina()
    {
        $pembina = Auth::user();

        // Pastikan yang mengakses adalah Pembina
        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh pembina.',
                ]);
        }

        // Hanya mengambil ekstrakurikuler
        // yang dibina oleh pembina yang sedang login
        $ekskul = Ekstrakurikuler::where(
            'pembina_id',
            $pembina->id
        )
        ->with([
            'jadwals',
            'anggota.siswa'
        ])
        ->latest()
        ->get();

        return view('ekskul.pembina', [
            'pembina' => $pembina,
            'ekskul' => $ekskul,
        ]);
    }
}