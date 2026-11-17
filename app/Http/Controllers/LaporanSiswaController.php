<?php

namespace App\Http\Controllers;

use App\Models\LaporanSiswa;
use App\Models\Notifikasi;
use App\Models\RiwayatLaporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class LaporanSiswaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => [
                'required',
                Rule::exists('user', 'id')->where('role', 'siswa'),
            ],
            'judul' => ['required', 'string', 'max:150'],
            'pesan' => ['required', 'string', 'max:2000'],
        ]);

        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat membuat laporan.',
                ]);
        }

        DB::transaction(function () use ($validated, $admin) {
            LaporanSiswa::create([
                'admin_id' => $admin->id,
                'siswa_id' => $validated['siswa_id'],
                'judul' => $validated['judul'],
                'pesan' => $validated['pesan'],
                'status' => 'Belum Ditinjau',
            ]);

           Notifikasi::create([
    'user_id' => $validated['siswa_id'],
    'judul' => "\u{1F6A8} Peringatan dari Admin",
    'pesan' => "\u{26A0}\u{FE0F} " . $validated['judul'] . ': ' . $validated['pesan'],
    'dibaca' => false,
]);

RiwayatLaporan::create([
    'admin_id' => $admin->id,
    'jenis_laporan' => 'Laporan Siswa',
    'filter' => $validated['pesan'],
    'jumlah_data' => 1,
]);

        });

        return back()->with(
            'success',
            'Laporan berhasil dikirim dan notifikasi telah dibuat.'
        );
    }

    public function updateStatus(Request $request, LaporanSiswa $laporanSiswa)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat mengubah status laporan.',
                ]);
        }

        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'Belum Ditinjau',
                    'Diproses',
                    'Selesai',
                ]),
            ],
        ]);

        $laporanSiswa->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'Status laporan berhasil diperbarui.'
        );
    }
}
