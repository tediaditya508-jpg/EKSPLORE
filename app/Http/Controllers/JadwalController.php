<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | JADWAL SISWA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $siswa = Auth::user();

        $jadwal = Jadwal::with('ekstrakurikuler')
            ->whereHas('ekstrakurikuler.anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.index', [
            'jadwal' => $jadwal,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | JADWAL PEMBINA
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


    /*
    |--------------------------------------------------------------------------
    | JADWAL ADMIN
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

        $jadwal = Jadwal::with('ekstrakurikuler')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.admin', [
            'admin' => $admin,
            'jadwal' => $jadwal,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH JADWAL ADMIN
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

        $ekskul = Ekstrakurikuler::orderBy('nama_ekskul')
            ->get();

        return view('jadwal.create', [
            'admin' => $admin,
            'ekskul' => $ekskul,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN JADWAL ADMIN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat menambahkan jadwal.',
                ]);
        }

        $data = $request->validate(
            [
                'ekskul_id' => [
                    'required',
                    'exists:ekstrakurikuler,id',
                ],

                'hari' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'jam_mulai' => [
                    'required',
                    'date_format:H:i',
                ],

                'jam_selesai' => [
                    'required',
                    'date_format:H:i',
                    'after:jam_mulai',
                ],

                'lokasi' => [
                    'required',
                    'string',
                    'max:255',
                ],
            ],
            [
                'ekskul_id.required' => 'Ekstrakurikuler wajib dipilih.',
                'ekskul_id.exists' => 'Ekstrakurikuler yang dipilih tidak ditemukan.',

                'hari.required' => 'Hari wajib diisi.',

                'jam_mulai.required' => 'Jam mulai wajib diisi.',
                'jam_mulai.date_format' => 'Format jam mulai harus HH:MM.',

                'jam_selesai.required' => 'Jam selesai wajib diisi.',
                'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
                'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',

                'lokasi.required' => 'Lokasi wajib diisi.',
            ]
        );

        Jadwal::create([
            'ekskul_id' => $data['ekskul_id'],
            'hari' => $data['hari'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'lokasi' => $data['lokasi'],
        ]);

        return redirect()
            ->route('admin.jadwal')
            ->with(
                'success',
                'Jadwal ekstrakurikuler berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM EDIT JADWAL ADMIN
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $jadwal = Jadwal::findOrFail($id);

        $ekskul = Ekstrakurikuler::orderBy('nama_ekskul')
            ->get();

        return view('jadwal.edit', [
            'admin' => $admin,
            'jadwal' => $jadwal,
            'ekskul' => $ekskul,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE JADWAL ADMIN
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat mengubah jadwal.',
                ]);
        }

        $jadwal = Jadwal::findOrFail($id);

        $data = $request->validate(
            [
                'ekskul_id' => [
                    'required',
                    'exists:ekstrakurikuler,id',
                ],

                'hari' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'jam_mulai' => [
                    'required',
                    'date_format:H:i',
                ],

                'jam_selesai' => [
                    'required',
                    'date_format:H:i',
                    'after:jam_mulai',
                ],

                'lokasi' => [
                    'required',
                    'string',
                    'max:255',
                ],
            ],
            [
                'ekskul_id.required' => 'Ekstrakurikuler wajib dipilih.',
                'ekskul_id.exists' => 'Ekstrakurikuler yang dipilih tidak ditemukan.',

                'hari.required' => 'Hari wajib diisi.',

                'jam_mulai.required' => 'Jam mulai wajib diisi.',
                'jam_mulai.date_format' => 'Format jam mulai harus HH:MM.',

                'jam_selesai.required' => 'Jam selesai wajib diisi.',
                'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
                'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',

                'lokasi.required' => 'Lokasi wajib diisi.',
            ]
        );

        $jadwal->update([
            'ekskul_id' => $data['ekskul_id'],
            'hari' => $data['hari'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'lokasi' => $data['lokasi'],
        ]);

        return redirect()
            ->route('admin.jadwal')
            ->with(
                'success',
                'Jadwal ekstrakurikuler berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS JADWAL ADMIN
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat menghapus jadwal.',
                ]);
        }

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()
            ->route('admin.jadwal')
            ->with(
                'success',
                'Jadwal ekstrakurikuler berhasil dihapus.'
            );
    }
}