<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Pendaftaran;
use App\Models\AnggotaEkskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM PENDAFTARAN SISWA
    |--------------------------------------------------------------------------
    */

    public function create($id)
    {
        $siswa = Auth::user();

        if ($siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya akun siswa yang dapat mendaftar ekstrakurikuler.',
                ]);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        return view('pendaftaran.create', [
            'ekskul' => $ekskul,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENDAFTARAN SISWA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {
        $siswa = Auth::user();

        if ($siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya akun siswa yang dapat mendaftar ekstrakurikuler.',
                ]);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $data = $request->validate([
            'alasan' => ['required', 'string', 'max:1000'],
        ], [
            'alasan.required' => 'Alasan mendaftar wajib diisi.',
            'alasan.max' => 'Alasan maksimal 1000 karakter.',
        ]);

        $sudahDaftar = Pendaftaran::where('siswa_id', $siswa->id)
            ->where('ekskul_id', $ekskul->id)
            ->whereIn('status', ['menunggu', 'diterima'])
            ->exists();

        if ($sudahDaftar) {
            return back()
                ->withErrors([
                    'alasan' => 'Kamu sudah memiliki pendaftaran pada ekskul ini.',
                ])
                ->withInput();
        }

        Pendaftaran::create([
            'siswa_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
            'nama' => $siswa->nama ?? $siswa->name ?? '-',
            'kelas' => $siswa->kelas ?? '-',
            'nis' => $siswa->nis ?? '-',
            'no_hp' => $siswa->no_hp ?? '-',
            'alasan' => $data['alasan'],
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('ekskul.show', $ekskul->id)
            ->with(
                'success',
                'Pendaftaran berhasil dikirim. Status pendaftaran: Menunggu.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PENDAFTARAN SAYA - SISWA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $siswa = Auth::user();

        if ($siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh siswa.',
                ]);
        }

        $pendaftaran = Pendaftaran::with('ekstrakurikuler')
            ->where('siswa_id', $siswa->id)
            ->latest()
            ->get();

        return view('pendaftaran.index', [
            'pendaftaran' => $pendaftaran,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | DAFTAR PENDAFTAR - PEMBINA
    |--------------------------------------------------------------------------
    */

    public function pembinaIndex()
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh pembina.',
                ]);
        }

        /*
        | Ambil ID semua ekskul yang dibina Pembina yang sedang login.
        */
        $ekskulIds = Ekstrakurikuler::where(
            'pembina_id',
            $pembina->id
        )->pluck('id');

        /*
        | Ambil semua pendaftaran dari ekskul tersebut.
        */
        $pendaftaran = Pendaftaran::with([
            'siswa',
            'ekstrakurikuler',
        ])
            ->whereIn('ekskul_id', $ekskulIds)
            ->latest()
            ->get();

        return view('pendaftaran.pembina', [
            'pendaftaran' => $pendaftaran,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS PENDAFTARAN - PEMBINA
    |--------------------------------------------------------------------------
    */

    public function updateStatus(Request $request, $id)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya pembina yang dapat mengubah status pendaftaran.',
                ]);
        }

        $data = $request->validate([
            'status' => ['required', 'in:diterima,ditolak'],
        ]);

        $pendaftaran = Pendaftaran::with('ekstrakurikuler')
            ->findOrFail($id);

        /*
        | Pastikan ekskul tersebut memang dibina
        | oleh Pembina yang sedang login.
        */
        if (
            !$pendaftaran->ekstrakurikuler ||
            (int) $pendaftaran->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return redirect()
                ->route('pembina.dashboard')
                ->withErrors([
                    'akses' => 'Kamu tidak memiliki akses ke pendaftaran ini.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        $pendaftaran->update([
            'status' => $data['status'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | JIKA DITERIMA → OTOMATIS MENJADI ANGGOTA EKSKUL
        |--------------------------------------------------------------------------
        */

        if ($data['status'] === 'diterima') {
            AnggotaEkskul::updateOrCreate(
                [
                    'siswa_id' => $pendaftaran->siswa_id,
                    'ekskul_id' => $pendaftaran->ekskul_id,
                ],
                [
                    'tanggal_daftar' => now()->toDateString(),
                    'status' => 'aktif',
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | JIKA DITOLAK → TIDAK MENJADI ANGGOTA
        |--------------------------------------------------------------------------
        */

        if ($data['status'] === 'ditolak') {
            AnggotaEkskul::where('siswa_id', $pendaftaran->siswa_id)
                ->where('ekskul_id', $pendaftaran->ekskul_id)
                ->delete();
        }

        return back()->with(
            'success',
            'Status pendaftaran berhasil diperbarui menjadi ' .
            $data['status'] .
            '.'
        );
    }
}