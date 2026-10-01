<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
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

        /** @var User $siswa */

        return view('profile.index', [
            'siswa' => $siswa,
        ]);
    }

    public function update(Request $request)
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh siswa.',
                ]);
        }

        /** @var User $siswa */

        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'nis' => [
                'nullable',
                'string',
                'max:50',
            ],
            'kelas' => [
                'nullable',
                'string',
                'max:100',
            ],
            'no_hp' => [
                'nullable',
                'string',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'max:15',
            ],
        ]);

        $siswa->update($data);

        return back()->with(
            'success',
            'Biodata berhasil diperbarui.'
        );
    }

    public function updateFoto(Request $request)
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh siswa.',
                ]);
        }

        /** @var User $siswa */

        $request->validate([
            'foto' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $foto = $request->file('foto')->store(
            'profile',
            'public'
        );

        $siswa->update([
            'foto' => $foto,
        ]);

        return back()->with(
            'success',
            'Foto profil berhasil diperbarui.'
        );
    }

    public function hapusFoto()
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh siswa.',
                ]);
        }

        /** @var User $siswa */

        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);

            $siswa->update([
                'foto' => null,
            ]);
        }

        return back()->with(
            'success',
            'Foto profil berhasil dihapus.'
        );
    }
}
