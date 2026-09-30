<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Jadwal;
use App\Models\Pengumuman;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // ==========================================
        // DATA SISWA YANG SEDANG LOGIN
        // ==========================================

        $siswa = Auth::user();


        // ==========================================
        // DATA EKSTRAKURIKULER
        // ==========================================

        $ekskul = Ekstrakurikuler::latest()
            ->take(6)
            ->get();

        $jumlahEkskul = Ekstrakurikuler::count();


        // ==========================================
        // JADWAL EKSTRAKURIKULER
        // ==========================================

        $jadwalHariIni = Jadwal::with('ekstrakurikuler')
            ->whereHas('ekstrakurikuler.anggota', function ($query) use ($siswa) {
            $query->where('siswa_id', $siswa->id);
     })
            ->orderBy('jam_mulai')
            ->take(5)
            ->get();


        // ==========================================
        // PENGUMUMAN
        // ==========================================

        $pengumuman = Pengumuman::latest('tanggal')
            ->take(5)
            ->get();


        // ==========================================
        // NILAI KEHADIRAN SISWA
        // ==========================================

        $nilaiAbsensi = Absensi::with([
                'anggota.ekstrakurikuler'
            ])
            ->whereHas('anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->where('status', 'hadir')
            ->whereNotNull('nilai')
            ->latest('tanggal')
            ->take(5)
            ->get();


        // ==========================================
        // DATA UNTUK DASHBOARD
        // ==========================================

        $dataDashboard = [
            'jumlahEkskul' => $jumlahEkskul,
            'jumlahJadwal' => Jadwal::count(),
            'jumlahPengumuman' => Pengumuman::count(),
        ];


        // ==========================================
        // KIRIM DATA KE VIEW SISWA
        // ==========================================

        return view('dashboard.index', [
            'siswa' => $siswa,
            'ekskul' => $ekskul,
            'jadwalHariIni' => $jadwalHariIni,
            'pengumuman' => $pengumuman,
            'nilaiAbsensi' => $nilaiAbsensi,
            'dataDashboard' => $dataDashboard,
        ]);
    }


    // ==========================================
    // DASHBOARD PEMBINA
    // ==========================================

    public function pembina()
    {
        $pembina = Auth::user();

        return view('dashboard.pembina', [
            'pembina' => $pembina,
        ]);
    }


    // ==========================================
    // DASHBOARD ADMIN
    // ==========================================

    public function admin()
    {
        $admin = Auth::user();

        return view('dashboard.admin', [
            'admin' => $admin,
        ]);
    }
}