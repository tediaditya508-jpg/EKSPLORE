<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PRESTASI SISWA
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

        $prestasi = Prestasi::with('ekstrakurikuler')
            ->latest('tanggal')
            ->get();

        return view('prestasi.index', [
            'siswa' => $siswa,
            'prestasi' => $prestasi,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | PRESTASI PEMBINA
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
        )
        ->with('prestasi')
        ->get();

        return view('prestasi.pembina', [
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
                    'akses' => 'Hanya pembina yang dapat menambahkan prestasi.',
                ]);
        }

        $data = $request->validate([
            'ekskul_id' => ['required', 'exists:ekstrakurikuler,id'],
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:100'],
            'tanggal' => ['nullable', 'date'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'dokumentasi' => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'dokumentasi.image' => 'Dokumentasi harus berupa gambar.',
            'dokumentasi.mimes' => 'Format dokumentasi harus JPG, JPEG, PNG, atau WEBP.',
            'dokumentasi.max' => 'Ukuran dokumentasi maksimal 2 MB.',
        ]);

        if ($request->hasFile('dokumentasi')) {
            $data['dokumentasi'] = $request->file('dokumentasi')->store('prestasi', 'public');
        }

        $ekskul = Ekstrakurikuler::where(
            'id',
            $data['ekskul_id']
        )
        ->where(
            'pembina_id',
            $pembina->id
        )
        ->first();

        if (!$ekskul) {
            return back()
                ->withErrors([
                    'akses' => 'Kamu tidak memiliki akses ke ekstrakurikuler tersebut.',
                ])
                ->withInput();
        }

        Prestasi::create($data);

        return back()->with(
            'success',
            'Prestasi berhasil ditambahkan.'
        );
    }


    public function update(Request $request, $id)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya pembina yang dapat mengubah prestasi.',
                ]);
        }

        $prestasi = Prestasi::with('ekstrakurikuler')
            ->findOrFail($id);

        if (
            !$prestasi->ekstrakurikuler ||
            (int) $prestasi->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return back()->withErrors([
                'akses' => 'Kamu tidak memiliki akses ke prestasi ini.',
            ]);
        }

        $data = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:100'],
            'tanggal' => ['nullable', 'date'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'dokumentasi' => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'dokumentasi.image' => 'Dokumentasi harus berupa gambar.',
            'dokumentasi.mimes' => 'Format dokumentasi harus JPG, JPEG, PNG, atau WEBP.',
            'dokumentasi.max' => 'Ukuran dokumentasi maksimal 2 MB.',
        ]);

        if ($request->hasFile('dokumentasi')) {
            if ($prestasi->dokumentasi && Storage::disk('public')->exists($prestasi->dokumentasi)) {
                Storage::disk('public')->delete($prestasi->dokumentasi);
            }

            $data['dokumentasi'] = $request->file('dokumentasi')->store('prestasi', 'public');
        } else {
            unset($data['dokumentasi']);
        }

        $prestasi->update($data);

        return back()->with(
            'success',
            'Prestasi berhasil diperbarui.'
        );
    }


    public function destroy($id)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya pembina yang dapat menghapus prestasi.',
                ]);
        }

        $prestasi = Prestasi::with('ekstrakurikuler')
            ->findOrFail($id);

        if (
            !$prestasi->ekstrakurikuler ||
            (int) $prestasi->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return back()->withErrors([
                'akses' => 'Kamu tidak memiliki akses ke prestasi ini.',
            ]);
        }

        if ($prestasi->dokumentasi && Storage::disk('public')->exists($prestasi->dokumentasi)) {
            Storage::disk('public')->delete($prestasi->dokumentasi);
        }

        $prestasi->delete();

        return back()->with(
            'success',
            'Prestasi berhasil dihapus.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PRESTASI ADMIN
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

        $prestasi = Prestasi::with([
            'ekstrakurikuler',
        ])
            ->latest('tanggal')
            ->get();

        return view('prestasi.admin', [
            'admin' => $admin,
            'prestasi' => $prestasi,
        ]);
    }
}