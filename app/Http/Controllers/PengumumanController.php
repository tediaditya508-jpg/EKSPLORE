<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Pengumuman;
use App\Models\AnggotaEkskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN SISWA
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

        // Hanya pengumuman dari ekskul yang diikuti siswa
        $ekskulIds = AnggotaEkskul::where('siswa_id', $siswa->id)
            ->pluck('ekskul_id');

        $pengumuman = Pengumuman::with('ekstrakurikuler')
            ->whereIn('ekskul_id', $ekskulIds)
            ->latest('tanggal')
            ->get();

        return view('pengumuman.index', [
            'siswa' => $siswa,
            'pengumuman' => $pengumuman,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN PEMBINA
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

        $pengumuman = Pengumuman::with('ekstrakurikuler')
            ->latest('tanggal')
            ->get();

        return view('pengumuman.pembina', [
            'pembina' => $pembina,
            'pengumuman' => $pengumuman,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH PENGUMUMAN PEMBINA
    |--------------------------------------------------------------------------
    */

    public function pembinaCreate()
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh pembina.',
                ]);
        }

        // Data ekstrakurikuler untuk pilihan pengumuman
        $ekskul = Ekstrakurikuler::where('pembina_id', $pembina->id)
    ->orderBy('nama_ekskul')
    ->get();

        return view('pengumuman.pembina-create', [
            'pembina' => $pembina,
            'ekskul' => $ekskul,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENGUMUMAN PEMBINA
    |--------------------------------------------------------------------------
    */

    public function pembinaStore(Request $request)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh pembina.',
                ]);
        }

        $data = $request->validate([
            'ekskul_id' => [
                'required',
                'exists:ekstrakurikuler,id',
            ],

            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'isi' => [
                'required',
                'string',
                'max:255',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'gambar' => [
                'nullable',
                'string',
                'max:255',
            ],
        ], [
            'ekskul_id.required' => 'Ekstrakurikuler wajib dipilih.',
            'ekskul_id.exists' => 'Ekstrakurikuler yang dipilih tidak ditemukan.',

            'judul.required' => 'Judul pengumuman wajib diisi.',
            'judul.max' => 'Judul pengumuman maksimal 255 karakter.',

            'isi.required' => 'Isi pengumuman wajib diisi.',

            'tanggal.required' => 'Tanggal pengumuman wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'gambar.max' => 'Nama/path gambar maksimal 255 karakter.',
        ]);

        Pengumuman::create([
            'ekskul_id' => $data['ekskul_id'],
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'tanggal' => $data['tanggal'],
            'gambar' => $data['gambar'] ?? null,
        ]);

        return redirect()
            ->route('pembina.pengumuman')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }


    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN ADMIN
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

        $pengumuman = Pengumuman::with('ekstrakurikuler')
            ->latest('tanggal')
            ->get();

        return view('pengumuman.admin', [
            'admin' => $admin,
            'pengumuman' => $pengumuman,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH PENGUMUMAN ADMIN
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        return view('pengumuman.create', [
            'admin' => $admin,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENGUMUMAN ADMIN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $data = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'isi' => [
                'required',
                'string',
                'max:255',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'gambar' => [
                'nullable',
                'string',
                'max:255',
            ],
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'judul.max' => 'Judul pengumuman maksimal 255 karakter.',

            'isi.required' => 'Isi pengumuman wajib diisi.',

            'tanggal.required' => 'Tanggal pengumuman wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'gambar.max' => 'Nama/path gambar maksimal 255 karakter.',
        ]);

        Pengumuman::create([
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'tanggal' => $data['tanggal'],
            'gambar' => $data['gambar'] ?? null,
        ]);

        return redirect()
            ->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }
}