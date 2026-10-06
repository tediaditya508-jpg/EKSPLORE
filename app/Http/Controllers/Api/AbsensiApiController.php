<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiApiController extends Controller
{
    /**
     * Pembina melihat daftar anggota dan absensi
     * dari ekstrakurikuler yang dibinanya.
     */
    public function pembina()
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya pembina yang dapat mengakses data absensi.',
            ], 403);
        }

        $ekskul = Ekstrakurikuler::where('pembina_id', $pembina->id)
            ->with(['anggota.siswa'])
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data absensi berhasil diambil.',
            'data' => $ekskul,
        ]);
    }

    /**
     * Pembina menyimpan atau memperbarui absensi anggota.
     */
    public function store(Request $request)
    {
        $pembina = Auth::user();

        if (!$pembina || $pembina->role !== 'pembina') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya pembina yang dapat mengisi absensi.',
            ], 403);
        }

        $data = $request->validate([
            'anggota_id' => ['required', 'exists:anggota_ekskul,id'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'in:hadir,izin,sakit,alpa'],
            'nilai' => ['nullable', 'integer', 'min:0', 'max:100'],
            'keterangan' => ['nullable', 'string', 'max:500'],
        ]);

        $anggota = AnggotaEkskul::with('ekstrakurikuler')
            ->findOrFail($data['anggota_id']);

        if (
            !$anggota->ekstrakurikuler ||
            (int) $anggota->ekstrakurikuler->pembina_id !== (int) $pembina->id
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak memiliki akses ke anggota ini.',
            ], 403);
        }

        $nilai = null;

        if ($data['status'] === 'hadir') {
            $nilai = $data['nilai'] ?? null;
        }

        $absensi = Absensi::updateOrCreate(
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

        return response()->json([
            'success' => true,
            'message' => 'Absensi berhasil disimpan.',
            'data' => $absensi->load([
                'anggota.siswa',
                'anggota.ekstrakurikuler',
            ]),
        ], 201);
    }

    /**
     * Siswa melihat riwayat kehadirannya.
     */
    public function siswa()
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya siswa yang dapat melihat data kehadiran.',
            ], 403);
        }

        $absensi = Absensi::with([
            'anggota.ekstrakurikuler',
        ])
            ->whereHas('anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->latest('tanggal')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Riwayat kehadiran berhasil diambil.',
            'data' => $absensi,
        ]);
    }

    /**
     * Siswa mengirim izin atau sakit.
     */
    public function storeSiswa(Request $request)
    {
        $siswa = Auth::user();

        if (!$siswa || $siswa->role !== 'siswa') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya siswa yang dapat mengajukan izin atau sakit.',
            ], 403);
        }

        $data = $request->validate([
            'anggota_id' => ['required', 'exists:anggota_ekskul,id'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'in:izin,sakit'],
            'keterangan' => ['required', 'string', 'max:500'],
        ]);

        $anggota = AnggotaEkskul::with('ekstrakurikuler')
            ->where('id', $data['anggota_id'])
            ->where('siswa_id', $siswa->id)
            ->first();

        if (!$anggota) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu tidak terdaftar sebagai anggota ekskul ini.',
            ], 403);
        }

        $absensiHariIni = Absensi::where('anggota_id', $data['anggota_id'])
            ->whereDate('tanggal', $data['tanggal'])
            ->first();

        if ($absensiHariIni) {
            return response()->json([
                'success' => false,
                'message' => 'Absensi untuk tanggal tersebut sudah diisi.',
            ], 422);
        }

        $absensi = Absensi::create([
            'anggota_id' => $data['anggota_id'],
            'tanggal' => $data['tanggal'],
            'status' => $data['status'],
            'nilai' => null,
            'keterangan' => $data['keterangan'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan izin/sakit berhasil dikirim.',
            'data' => $absensi->load([
                'anggota.ekstrakurikuler',
            ]),
        ], 201);
    }
}