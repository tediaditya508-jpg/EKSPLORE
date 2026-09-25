<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Pendaftaran;
use App\Models\AnggotaEkskul;
use App\Models\Notifikasi;
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
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $siswa = Auth::user();

        // Pastikan akun yang digunakan adalah akun siswa
        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya akun siswa yang dapat mendaftar ekstrakurikuler.',
                ]);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        return view('pendaftaran.create', [
            'ekskul' => $ekskul,
            'siswa' => $siswa,
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

        if (!$siswa || $siswa->role !== 'siswa') {
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

        if (!$siswa || $siswa->role !== 'siswa') {
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

        $ekskulIds = Ekstrakurikuler::where(
            'pembina_id',
            $pembina->id
        )->pluck('id');

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

        // Pastikan pembina hanya dapat memproses pendaftaran
        // dari ekstrakurikuler yang menjadi tanggung jawabnya.
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

        // Pendaftaran yang sudah diproses tidak boleh diproses ulang.
        if ($pendaftaran->status !== 'menunggu') {
            return back()->withErrors([
                'status' => 'Pendaftaran ini sudah diproses sebelumnya.',
            ]);
        }

        $pendaftaran->update([
            'status' => $data['status'],
        ]);

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

        if ($data['status'] === 'ditolak') {
            AnggotaEkskul::where('siswa_id', $pendaftaran->siswa_id)
                ->where('ekskul_id', $pendaftaran->ekskul_id)
                ->delete();
        }

        $namaEkskul = $pendaftaran->ekstrakurikuler->nama_ekskul
            ?? $pendaftaran->ekstrakurikuler->nama
            ?? 'Ekstrakurikuler';

        if ($data['status'] === 'diterima') {
            Notifikasi::create([
                'user_id' => $pendaftaran->siswa_id,
                'judul' => 'Pendaftaran Ekskul Diterima',
                'pesan' => 'Selamat! Pendaftaran kamu pada ekskul "' .
                    $namaEkskul .
                    '" telah diterima. Sekarang kamu sudah menjadi anggota ekskul tersebut.',
                'dibaca' => false,
            ]);
        } else {
            Notifikasi::create([
                'user_id' => $pendaftaran->siswa_id,
                'judul' => 'Pendaftaran Ekskul Ditolak',
                'pesan' => 'Pendaftaran kamu pada ekskul "' .
                    $namaEkskul .
                    '" ditolak oleh pembina.',
                'dibaca' => false,
            ]);
        }

        return back()->with(
            'success',
            'Status pendaftaran berhasil diperbarui menjadi ' .
            $data['status'] .
            '.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DAFTAR PENDAFTAR - ADMIN
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

        $pendaftaran = Pendaftaran::with([
            'siswa',
            'ekstrakurikuler',
        ])
            ->latest()
            ->get();

        return view('pendaftaran.admin', [
            'pendaftaran' => $pendaftaran,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS PENDAFTARAN - ADMIN
    |--------------------------------------------------------------------------
    */

    public function adminUpdateStatus(Request $request, $id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat mengubah status pendaftaran.',
                ]);
        }

        $data = $request->validate([
            'status' => ['required', 'in:diterima,ditolak'],
        ]);

        $pendaftaran = Pendaftaran::with('ekstrakurikuler')
            ->findOrFail($id);

        // Pendaftaran yang sudah diproses tidak boleh diproses ulang.
        if ($pendaftaran->status !== 'menunggu') {
            return back()->withErrors([
                'status' => 'Pendaftaran ini sudah diproses sebelumnya.',
            ]);
        }

        $pendaftaran->update([
            'status' => $data['status'],
        ]);

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

        if ($data['status'] === 'ditolak') {
            AnggotaEkskul::where('siswa_id', $pendaftaran->siswa_id)
                ->where('ekskul_id', $pendaftaran->ekskul_id)
                ->delete();
        }

        $namaEkskul = $pendaftaran->ekstrakurikuler->nama_ekskul
            ?? $pendaftaran->ekstrakurikuler->nama
            ?? 'Ekstrakurikuler';

        if ($data['status'] === 'diterima') {
            Notifikasi::create([
                'user_id' => $pendaftaran->siswa_id,
                'judul' => 'Pendaftaran Ekskul Diterima',
                'pesan' => 'Selamat! Pendaftaran kamu pada ekskul "' .
                    $namaEkskul .
                    '" telah diterima oleh admin. Sekarang kamu sudah menjadi anggota ekskul tersebut.',
                'dibaca' => false,
            ]);
        } else {
            Notifikasi::create([
                'user_id' => $pendaftaran->siswa_id,
                'judul' => 'Pendaftaran Ekskul Ditolak',
                'pesan' => 'Pendaftaran kamu pada ekskul "' .
                    $namaEkskul .
                    '" ditolak oleh admin.',
                'dibaca' => false,
            ]);
        }

        return back()->with(
            'success',
            'Status pendaftaran berhasil diperbarui menjadi ' .
            $data['status'] .
            '.'
        );
    }
}