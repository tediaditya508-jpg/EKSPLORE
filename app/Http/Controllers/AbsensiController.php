<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ABSENSI PEMBINA
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | PEMBINA MENYIMPAN ABSENSI
    |--------------------------------------------------------------------------
    */

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
            'anggota_id' => [
                'required',
                'exists:anggota_ekskul,id',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:hadir,izin,sakit,alpa',
            ],

            'nilai' => [
                'nullable',
                'integer',
                'min:0',
                'max:100',
            ],

            'keterangan' => [
                'nullable',
                'string',
                'max:500',
            ],
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

        /*
        |--------------------------------------------------------------------------
        | NILAI HANYA UNTUK HADIR
        |--------------------------------------------------------------------------
        */

        $nilai = null;

        if ($data['status'] === 'hadir') {
            $nilai = $data['nilai'] ?? null;
        }

        Absensi::updateOrCreate(
            [
                'anggota_id' => $data['anggota_id'],
                'tanggal' => $data['tanggal'],
            ],
            [
                'status' => $data['status'],
                'nilai' => $nilai,
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
    | SISWA MENGAJUKAN IZIN / SAKIT
    |--------------------------------------------------------------------------
    */

    public function storeSiswa(Request $request)
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya siswa yang dapat mengisi izin atau sakit.',
                ]);
        }

        $data = $request->validate([
            'anggota_id' => [
                'required',
                'exists:anggota_ekskul,id',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:izin,sakit',
            ],

            'keterangan' => [
                'required',
                'string',
                'max:500',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | PASTIKAN ANGGOTA ADALAH MILIK SISWA YANG LOGIN
        |--------------------------------------------------------------------------
        */

        $anggota = \App\Models\AnggotaEkskul::with('ekstrakurikuler')
            ->where('id', $data['anggota_id'])
            ->where('siswa_id', $siswa->id)
            ->first();

        if (!$anggota) {
            return back()->withErrors([
                'akses' => 'Kamu tidak terdaftar sebagai anggota ekskul ini.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | CEK APAKAH ABSENSI TANGGAL TERSEBUT SUDAH ADA
        |--------------------------------------------------------------------------
        */

        $absensiHariIni = Absensi::where('anggota_id', $data['anggota_id'])
            ->whereDate('tanggal', $data['tanggal'])
            ->first();

        if ($absensiHariIni) {
            return back()->withErrors([
                'tanggal' => 'Absensi untuk tanggal tersebut sudah diisi.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN IZIN / SAKIT
        |--------------------------------------------------------------------------
        */

        Absensi::create([
            'anggota_id' => $data['anggota_id'],
            'tanggal' => $data['tanggal'],
            'status' => $data['status'],
            'nilai' => null,
            'keterangan' => $data['keterangan'],
        ]);

        return back()->with(
            'success',
            'Pengajuan izin/sakit berhasil dikirim.'
        );
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