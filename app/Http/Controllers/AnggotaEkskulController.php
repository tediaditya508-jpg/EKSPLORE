<?php

namespace App\Http\Controllers;

use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Facades\Auth;

class AnggotaEkskulController extends Controller
{
    public function index()
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh pembina.',
                ]);
        }

        $ekskul = Ekstrakurikuler::where(
            'pembina_id',
            $pembina->id
        )->get();

        $ekskulIds = $ekskul->pluck('id');

        $anggota = AnggotaEkskul::with([
            'siswa',
            'ekstrakurikuler',
        ])
            ->whereIn('ekskul_id', $ekskulIds)
            ->where('status', 'aktif')
            ->latest()
            ->get();

        return view('anggota.pembina', [
            'pembina' => $pembina,
            'ekskul' => $ekskul,
            'anggota' => $anggota,
        ]);
    }
}