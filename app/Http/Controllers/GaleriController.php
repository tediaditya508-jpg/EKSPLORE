<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh siswa.',
                ]);
        }

        $galeri = Galeri::with('ekstrakurikuler')
            ->latest()
            ->get();

        return view('galeri.index', [
            'siswa' => $siswa,
            'galeri' => $galeri,
        ]);
    }

    public function pembina()
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh pembina.',
                ]);
        }

        $ekskul = Ekstrakurikuler::where('pembina_id', $pembina->id)
            ->get();

        $galeri = Galeri::with('ekstrakurikuler')
            ->whereHas('ekstrakurikuler', function ($query) use ($pembina) {
                $query->where('pembina_id', $pembina->id);
            })
            ->latest()
            ->get();

        return view('galeri.pembina', [
            'pembina' => $pembina,
            'ekskul' => $ekskul,
            'galeri' => $galeri,
        ]);
    }

    public function store(Request $request)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya pembina yang dapat menambahkan galeri.',
                ]);
        }

        $data = $request->validate([
            'ekskul_id' => [
                'required',
                'exists:ekstrakurikulers,id',
            ],
            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $ekskul = Ekstrakurikuler::where('id', $data['ekskul_id'])
            ->where('pembina_id', $pembina->id)
            ->first();

        if (!$ekskul) {
            return back()->withErrors([
                'akses' => 'Kamu tidak memiliki akses ke ekstrakurikuler tersebut.',
            ]);
        }

        $gambar = $request->file('gambar')->store(
            'galeri',
            'public'
        );

        Galeri::create([
            'ekskul_id' => $data['ekskul_id'],
            'gambar' => $gambar,
            'keterangan' => $data['keterangan'] ?? null,
        ]);

        return back()->with(
            'success',
            'Foto galeri berhasil ditambahkan.'
        );
    }

    public function destroy($id)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return redirect()->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya pembina yang dapat menghapus galeri.',
                ]);
        }

        $galeri = Galeri::with('ekstrakurikuler')
            ->findOrFail($id);

        if (
            !$galeri->ekstrakurikuler ||
            (int) $galeri->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return back()->withErrors([
                'akses' => 'Kamu tidak memiliki akses ke galeri ini.',
            ]);
        }

        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return back()->with(
            'success',
            'Foto galeri berhasil dihapus.'
        );
    }

    public function adminIndex()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $galeri = Galeri::with('ekstrakurikuler')
            ->latest()
            ->get();

        return view('galeri.admin', [
            'admin' => $admin,
            'galeri' => $galeri,
        ]);
    }
}