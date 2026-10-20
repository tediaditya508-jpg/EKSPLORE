<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            ->orderByRaw("CASE WHEN jenis = 'event' THEN tanggal_event END ASC")
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
            ->orderByRaw("CASE WHEN jenis = 'event' THEN tanggal_event END ASC")
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
            ->orderByRaw("CASE WHEN jenis = 'event' THEN tanggal_event END ASC")
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

        $ekskul = Ekstrakurikuler::orderBy('nama_ekskul')->get();

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

        $data = $request->validate([
            'ekskul_id' => [
                'required',
                'exists:ekstrakurikuler,id',
            ],
            'jenis' => [
                'required',
                Rule::in(['rutin', 'event']),
            ],
            'nama_event' => [
                'nullable',
                'required_if:jenis,event',
                'string',
                'max:255',
            ],
            'tanggal_event' => [
                'nullable',
                'required_if:jenis,event',
                'date',
            ],
            'hari' => [
                Rule::requiredIf($request->input('jenis') === 'rutin'),
                'nullable',
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
        ], [
            'ekskul_id.required' => 'Ekstrakurikuler wajib dipilih.',
            'ekskul_id.exists' => 'Ekstrakurikuler yang dipilih tidak ditemukan.',
            'jenis.required' => 'Jenis jadwal wajib dipilih.',
            'jenis.in' => 'Jenis jadwal tidak valid.',
            'nama_event.required_if' => 'Nama event wajib diisi.',
            'tanggal_event.required_if' => 'Tanggal event wajib diisi.',
            'tanggal_event.date' => 'Tanggal event tidak valid.',
            'hari.required' => 'Hari wajib diisi.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_mulai.date_format' => 'Format jam mulai harus HH:MM.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]);

        Jadwal::create([
            'ekskul_id' => $data['ekskul_id'],
            'jenis' => $data['jenis'],
            'nama_event' => $data['jenis'] === 'event'
                ? $data['nama_event']
                : null,
            'tanggal_event' => $data['jenis'] === 'event'
                ? $data['tanggal_event']
                : null,
            'hari' => $data['hari'] ?? null,
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'lokasi' => $data['lokasi'],
        ]);

        return redirect()
            ->route('admin.jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan.');
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
        $ekskul = Ekstrakurikuler::orderBy('nama_ekskul')->get();

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

        $data = $request->validate([
            'ekskul_id' => [
                'required',
                'exists:ekstrakurikuler,id',
            ],
            'jenis' => [
                'required',
                Rule::in(['rutin', 'event']),
            ],
            'nama_event' => [
                'nullable',
                'required_if:jenis,event',
                'string',
                'max:255',
            ],
            'tanggal_event' => [
                'nullable',
                'required_if:jenis,event',
                'date',
            ],
            'hari' => [
                Rule::requiredIf($request->input('jenis') === 'rutin'),
                'nullable',
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
        ], [
            'ekskul_id.required' => 'Ekstrakurikuler wajib dipilih.',
            'ekskul_id.exists' => 'Ekstrakurikuler yang dipilih tidak ditemukan.',
            'jenis.required' => 'Jenis jadwal wajib dipilih.',
            'jenis.in' => 'Jenis jadwal tidak valid.',
            'nama_event.required_if' => 'Nama event wajib diisi.',
            'tanggal_event.required_if' => 'Tanggal event wajib diisi.',
            'tanggal_event.date' => 'Tanggal event tidak valid.',
            'hari.required' => 'Hari wajib diisi.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_mulai.date_format' => 'Format jam mulai harus HH:MM.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.date_format' => 'Format jam selesai harus HH:MM.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]);

        $jadwal->update([
            'ekskul_id' => $data['ekskul_id'],
            'jenis' => $data['jenis'],
            'nama_event' => $data['jenis'] === 'event'
                ? $data['nama_event']
                : null,
            'tanggal_event' => $data['jenis'] === 'event'
                ? $data['tanggal_event']
                : null,
            'hari' => $data['hari'] ?? null,
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'lokasi' => $data['lokasi'],
        ]);

        return redirect()
            ->route('admin.jadwal')
            ->with('success', 'Jadwal berhasil diperbarui.');
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
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}