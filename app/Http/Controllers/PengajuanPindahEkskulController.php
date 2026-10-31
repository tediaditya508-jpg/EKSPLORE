<?php
namespace App\Http\Controllers;

use App\Models\PengajuanPindahEkskul;
use App\Models\Ekstrakurikuler;
use App\Models\AnggotaEkskul;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PengajuanPindahEkskulController extends Controller
{
    /**
     * Daftar pengajuan pindah milik siswa.
     */
    public function index()
    {
        $pengajuan = PengajuanPindahEkskul::with([
            'ekskulAsal',
            'ekskulTujuan'
        ])
            ->where('siswa_id', Auth::id())
            ->latest()
            ->get();

        return view('pindah_ekskul.index', compact('pengajuan'));
    }

    /**
     * Form pengajuan pindah ekskul.
     */
    public function create()
{
    $anggotaAktif = AnggotaEkskul::with('ekstrakurikuler')
        ->where('siswa_id', Auth::id())
        ->where('status', 'aktif')
        ->get();

    $ekskulTujuan = Ekstrakurikuler::orderBy('nama_ekskul')->get();

    return view('pindah_ekskul.create', compact(
        'anggotaAktif',
        'ekskulTujuan'
    ));
}

    /**
     * Menyimpan pengajuan pindah ekskul.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ekskul_asal_id' => 'required|integer|exists:ekstrakurikuler,id',
            'ekskul_tujuan_id' => 'required|integer|exists:ekstrakurikuler,id|different:ekskul_asal_id',
            'alasan' => 'required|string|min:10|max:1000',
        ]);

        $siswaId = Auth::id();

        DB::transaction(function () use ($request, $siswaId) {
            $anggotaAsal = AnggotaEkskul::where('siswa_id', $siswaId)
                ->where('ekskul_id', $request->ekskul_asal_id)
                ->where('status', 'aktif')
                ->lockForUpdate()
                ->first();

            if (!$anggotaAsal) {
                throw ValidationException::withMessages([
                    'ekskul_asal_id' => 'Kamu bukan anggota aktif ekskul asal tersebut.',
                ]);
            }

            $sudahTerdaftar = AnggotaEkskul::where('siswa_id', $siswaId)
                ->where('ekskul_id', $request->ekskul_tujuan_id)
                ->where('status', 'aktif')
                ->exists();

            if ($sudahTerdaftar) {
                throw ValidationException::withMessages([
                    'ekskul_tujuan_id' => 'Kamu sudah menjadi anggota aktif ekskul tujuan.',
                ]);
            }

            $pengajuanBerjalan = PengajuanPindahEkskul::where('siswa_id', $siswaId)
                ->where('status', 'menunggu')
                ->exists();

            if ($pengajuanBerjalan) {
                throw ValidationException::withMessages([
                    'ekskul_tujuan_id' => 'Masih ada pengajuan pindah ekskul yang menunggu keputusan.',
                ]);
            }

            PengajuanPindahEkskul::create([
                'siswa_id' => $siswaId,
                'ekskul_asal_id' => $request->ekskul_asal_id,
                'ekskul_tujuan_id' => $request->ekskul_tujuan_id,
                'alasan' => $request->alasan,
                'status' => 'menunggu',
            ]);
        });

        return redirect()
            ->route('pindah_ekskul.index')
            ->with('success', 'Pengajuan pindah ekskul berhasil dikirim.');
    }

    /**
     * Daftar pengajuan untuk Pembina ekskul asal.
     */
    public function pembinaIndex()
    {
        $pembinaId = Auth::id();

        $pengajuan = PengajuanPindahEkskul::with([
            'siswa',
            'ekskulAsal',
            'ekskulTujuan'
        ])
            ->where('status', 'menunggu')
            ->whereHas('ekskulAsal', function ($query) use ($pembinaId) {
                $query->where('pembina_id', $pembinaId);
            })
            ->latest()
            ->get();

        return view('pindah_ekskul.pembina', compact('pengajuan'));
    }

    /**
     * Pembina menyetujui atau menolak pengajuan.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $pembinaId = Auth::id();

        DB::transaction(function () use ($request, $id, $pembinaId) {
            $pengajuan = PengajuanPindahEkskul::with([
                'ekskulAsal',
                'ekskulTujuan'
            ])
                ->lockForUpdate()
                ->findOrFail($id);

            if (!$pengajuan->ekskulAsal ||
                (int) $pengajuan->ekskulAsal->pembina_id !== (int) $pembinaId) {
                abort(403, 'Kamu tidak berhak memproses pengajuan ini.');
            }

            $this->prosesPengajuan($pengajuan, $request->status);
        });

        return back()->with('success', 'Pengajuan berhasil diproses.');
    }

    /**
     * Daftar seluruh pengajuan untuk Admin.
     */
    public function adminIndex()
    {
        $pengajuan = PengajuanPindahEkskul::with([
            'siswa',
            'ekskulAsal',
            'ekskulTujuan'
        ])
            ->latest()
            ->get();

        return view('pindah_ekskul.admin', compact('pengajuan'));
    }

    /**
     * Admin menyetujui atau menolak pengajuan.
     */
    public function adminUpdateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        DB::transaction(function () use ($request, $id) {
            $pengajuan = PengajuanPindahEkskul::with([
                'ekskulAsal',
                'ekskulTujuan'
            ])
                ->lockForUpdate()
                ->findOrFail($id);

            $this->prosesPengajuan($pengajuan, $request->status);
        });

        return back()->with('success', 'Pengajuan berhasil diproses.');
    }

    /**
     * Proses persetujuan atau penolakan.
     */
    private function prosesPengajuan(
        PengajuanPindahEkskul $pengajuan,
        string $status
    ): void {
        if ($pengajuan->status !== 'menunggu') {
            throw ValidationException::withMessages([
                'status' => 'Pengajuan ini sudah pernah diproses.',
            ]);
        }

        if ($status === 'diterima') {
            $anggotaAsal = AnggotaEkskul::where('siswa_id', $pengajuan->siswa_id)
                ->where('ekskul_id', $pengajuan->ekskul_asal_id)
                ->where('status', 'aktif')
                ->lockForUpdate()
                ->first();

            if (!$anggotaAsal) {
                throw ValidationException::withMessages([
                    'status' => 'Keanggotaan ekskul asal sudah tidak aktif.',
                ]);
            }

            $sudahTerdaftar = AnggotaEkskul::where('siswa_id', $pengajuan->siswa_id)
                ->where('ekskul_id', $pengajuan->ekskul_tujuan_id)
                ->where('status', 'aktif')
                ->exists();

            if ($sudahTerdaftar) {
                throw ValidationException::withMessages([
                    'status' => 'Siswa sudah menjadi anggota aktif ekskul tujuan.',
                ]);
            }

            // Ganti ekskul pada keanggotaan yang sama.
            $anggotaAsal->update([
                'ekskul_id' => $pengajuan->ekskul_tujuan_id,
                'tanggal_daftar' => now()->toDateString(),
            ]);
        }

        // Jika ditolak, keanggotaan siswa tidak diubah.
        $pengajuan->update([
            'status' => $status,
        ]);

        Notifikasi::create([
            'user_id' => $pengajuan->siswa_id,
            'judul' => $status === 'diterima'
                ? 'Pengajuan Pindah Ekskul Diterima'
                : 'Pengajuan Pindah Ekskul Ditolak',
            'pesan' => $status === 'diterima'
                ? 'Pengajuan pindah dari ' . ($pengajuan->ekskulAsal->nama_ekskul ?? '-') .
                    ' ke ' . ($pengajuan->ekskulTujuan->nama_ekskul ?? '-') . ' telah diterima.'
                : 'Pengajuan pindah ekskul kamu ditolak. Keanggotaan ekskul asal tetap dipertahankan.',
            'dibaca' => false,
        ]);
    }
}
