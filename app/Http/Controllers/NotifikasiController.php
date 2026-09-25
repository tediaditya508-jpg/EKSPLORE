<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
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

        $notifikasi = Notifikasi::where('user_id', $siswa->id)
            ->latest()
            ->get();

        return view('notifikasi.index', [
            'siswa' => $siswa,
            'notifikasi' => $notifikasi,
        ]);
    }

    public function tandaiDibaca($id)
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()->route('dashboard');
        }

        $notifikasi = Notifikasi::where('id', $id)
            ->where('user_id', $siswa->id)
            ->firstOrFail();

        $notifikasi->update([
            'dibaca' => true,
        ]);

        return back();
    }

    public function tandaiSemuaDibaca()
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()->route('dashboard');
        }

        Notifikasi::where('user_id', $siswa->id)
            ->where('dibaca', false)
            ->update([
                'dibaca' => true,
            ]);

        return back();
    }
}