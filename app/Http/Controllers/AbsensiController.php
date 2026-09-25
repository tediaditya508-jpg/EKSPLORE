<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
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

        $ekskul = Ekstrakurikuler::where('pembina_id', $pembina->id)
            ->with(['anggota.siswa'])
            ->get();

        return view('absensi.pembina', [
            'pembina' => $pembina,
            'ekskul' => $ekskul,
        ]);
    }


    public function store(Request $request)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya pembina yang dapat mengisi absensi.',
                ]);
        }

        $data = $request->validate([
            'anggota_id' => ['required', 'exists:anggota_ekskuls,id'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'in:hadir,izin,sakit,alpa'],
            'keterangan' => ['nullable', 'string', 'max:500'],
        ]);

        $anggota = \App\Models\AnggotaEkskul::with('ekstrakurikuler')
            ->findOrFail($data['anggota_id']);

        if (
            !$anggota->ekstrakurikuler ||
            (int) $anggota->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return back()->withErrors([
                'akses' => 'Kamu tidak memiliki akses ke anggota ini.',
            ]);
        }

        Absensi::updateOrCreate(
            [
                'anggota_id' => $data['anggota_id'],
                'tanggal' => $data['tanggal'],
            ],
            [
                'status' => $data['status'],
                'keterangan' => $data['keterangan'] ?? null,
            ]
        );

        return back()->with(
            'success',
            'Absensi berhasil disimpan.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ABSENSI SISWA
    |--------------------------------------------------------------------------
    */

    public function siswa()
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh siswa.',
                ]);
        }

        $absensi = Absensi::with([
            'anggota.ekstrakurikuler',
        ])
            ->whereHas('anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->latest('tanggal')
            ->get();

        $jumlahHadir = $absensi->where('status', 'hadir')->count();
        $jumlahIzin = $absensi->where('status', 'izin')->count();
        $jumlahSakit = $absensi->where('status', 'sakit')->count();
        $jumlahAlpa = $absensi->where('status', 'alpa')->count();

        return view('absensi.siswa', [
            'siswa' => $siswa,
            'absensi' => $absensi,
            'jumlahHadir' => $jumlahHadir,
            'jumlahIzin' => $jumlahIzin,
            'jumlahSakit' => $jumlahSakit,
            'jumlahAlpa' => $jumlahAlpa,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | ABSENSI ADMIN
    |--------------------------------------------------------------------------
    */

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

        $absensi = Absensi::with([
            'anggota.siswa',
            'anggota.ekstrakurikuler',
        ])
            ->latest('tanggal')
            ->get();

        return view('absensi.admin', [
            'admin' => $admin,
            'absensi' => $absensi,
        ]);
    }
}