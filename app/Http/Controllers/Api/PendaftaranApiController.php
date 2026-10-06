<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use App\Models\Notifikasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranApiController extends Controller
{
    /**
     * Menampilkan pendaftaran milik siswa yang sedang login.
     */
    public function index()
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya siswa yang dapat melihat pendaftaran.',
            ], 403);
        }

        $pendaftaran = Pendaftaran::with('ekstrakurikuler')
            ->where('siswa_id', $siswa->id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pendaftaran berhasil diambil.',
            'data' => $pendaftaran,
        ]);
    }

    /**
     * Membuat pendaftaran ekstrakurikuler.
     */
    public function store(Request $request, $id)
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya siswa yang dapat melakukan pendaftaran.',
            ], 403);
        }

        $ekskul = Ekstrakurikuler::find($id);

        if (!$ekskul) {
            return response()->json([
                'success' => false,
                'message' => 'Ekstrakurikuler tidak ditemukan.',
            ], 404);
        }

        $data = $request->validate([
            'alasan' => ['required', 'string', 'max:1000'],
        ]);

        $sudahTerdaftar = Pendaftaran::where('siswa_id', $siswa->id)
            ->where('ekskul_id', $ekskul->id)
            ->whereIn('status', ['menunggu', 'diterima'])
            ->exists();

        if ($sudahTerdaftar) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu sudah memiliki pendaftaran untuk ekstrakurikuler ini.',
            ], 422);
        }

        $pendaftaran = Pendaftaran::create([
            'siswa_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
            'nama' => $siswa->nama ?? $siswa->name,
            'kelas' => $siswa->kelas,
            'nis' => $siswa->nis,
            'no_hp' => $siswa->no_hp,
            'alasan' => $data['alasan'],
            'status' => 'menunggu',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil dikirim.',
            'data' => $pendaftaran->load('ekstrakurikuler'),
        ], 201);
    }

    /**
     * Pembina melihat pendaftaran untuk ekstrakurikuler yang dibinanya.
     */
    public function pembinaIndex()
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya pembina yang dapat mengakses data ini.',
            ], 403);
        }

        $ekskulIds = Ekstrakurikuler::where('pembina_id', $pembina->id)
            ->pluck('id');

        $pendaftaran = Pendaftaran::with([
            'siswa',
            'ekstrakurikuler',
        ])
            ->whereIn('ekskul_id', $ekskulIds)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pendaftaran berhasil diambil.',
            'data' => $pendaftaran,
        ]);
    }

    /**
     * Pembina menerima atau menolak pendaftaran.
     */
    public function updateStatus(Request $request, $id)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya pembina yang dapat memproses pendaftaran.',
            ], 403);
        }

        $data = $request->validate([
            'status' => ['required', 'in:diterima,ditolak'],
        ]);

        $pendaftaran = Pendaftaran::with('ekstrakurikuler')
            ->find($id);

        if (!$pendaftaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pendaftaran tidak ditemukan.',
            ], 404);
        }

        if (
            !$pendaftaran->ekstrakurikuler ||
            (int) $pendaftaran->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak memiliki akses ke pendaftaran ini.',
            ], 403);
        }

        if ($pendaftaran->status !== 'menunggu') {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran ini sudah diproses.',
            ], 422);
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
        } else {
            AnggotaEkskul::where('siswa_id', $pendaftaran->siswa_id)
                ->where('ekskul_id', $pendaftaran->ekskul_id)
                ->delete();
        }

        Notifikasi::create([
            'user_id' => $pendaftaran->siswa_id,
            'judul' => $data['status'] === 'diterima'
                ? 'Pendaftaran diterima'
                : 'Pendaftaran ditolak',
            'pesan' => $data['status'] === 'diterima'
                ? 'Pendaftaran ekstrakurikuler kamu telah diterima.'
                : 'Pendaftaran ekstrakurikuler kamu telah ditolak.',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status pendaftaran berhasil diperbarui.',
            'data' => $pendaftaran->load('ekstrakurikuler'),
        ]);
    }
}