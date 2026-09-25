<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('ekstrakurikuler')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.index', [
            'jadwal' => $jadwal,
        ]);
    }

    public function pembina()
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

        $jadwal = Jadwal::with('ekstrakurikuler')
            ->whereIn('ekskul_id', $ekskulIds)
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.pembina', [
            'pembina' => $pembina,
            'ekskul' => $ekskul,
            'jadwal' => $jadwal,
        ]);
    }

    public function adminIndex()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $jadwal = Jadwal::with('ekstrakurikuler')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.admin', [
            'admin' => $admin,
            'jadwal' => $jadwal,
        ]);
    }
}