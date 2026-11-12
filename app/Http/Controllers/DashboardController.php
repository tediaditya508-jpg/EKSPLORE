<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\Pengumuman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Label bulan untuk grafik (6 bulan terakhir).
     *
     * @return array{labels: array<int, string>, keys: array<int, string>}
     */
    private function monthlyPeriods(int $months = 6): array
    {
        $start = now()->startOfMonth()->subMonthsNoOverflow($months - 1);
        $labels = [];
        $keys = [];

        for ($i = 0; $i < $months; $i++) {
            $month = $start->copy()->addMonthsNoOverflow($i);

            $keys[] = $month->format('Y-m');
            $labels[] = $month->locale('id')->translatedFormat('M Y');
        }

        return ['labels' => $labels, 'keys' => $keys];
    }

    /**
     * Susun data grafik kehadiran per bulan dari koleksi absensi.
     *
     * @param  \Illuminate\Support\Collection<int, Absensi>  $absensi
     * @return array{labels: array<int, string>, hadir: array<int, int>, izin: array<int, int>, sakit: array<int, int>, alfa: array<int, int>}
     */
    private function buildAttendanceChart($absensi, int $months = 6): array
    {
        $periods = $this->monthlyPeriods($months);
        $statuses = ['hadir', 'izin', 'sakit', 'alfa'];

        $data = [];
        foreach ($statuses as $status) {
            $data[$status] = array_fill(0, $months, 0);
        }

        foreach ($absensi as $item) {
            $key = $item->tanggal?->format('Y-m');
            $index = array_search($key, $periods['keys'], true);

            if ($index === false || ! in_array($item->status, $statuses, true)) {
                continue;
            }

            $data[$item->status][$index]++;
        }

        return [
            'labels' => $periods['labels'],
            'hadir' => $data['hadir'],
            'izin' => $data['izin'],
            'sakit' => $data['sakit'],
            'alfa' => $data['alfa'],
        ];
    }

    public function index()
    {
        abort_unless(
            in_array(Auth::user()?->role, ['siswa', 'admin']),
            403
        );

        $siswa = Auth::user();

        $ekskul = Ekstrakurikuler::latest()
            ->take(6)
            ->get();

        $jumlahEkskul = Ekstrakurikuler::count();

        $ekskulDiikuti = AnggotaEkskul::where('siswa_id', $siswa->id)
            ->pluck('ekskul_id');

        $jadwalHariIni = Jadwal::with('ekstrakurikuler')
            ->whereHas('ekstrakurikuler.anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->orderBy('jam_mulai')
            ->take(5)
            ->get();

        $pengumuman = Pengumuman::with(['ekstrakurikuler.pembina'])
            ->whereHas('ekstrakurikuler.anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->latest('tanggal')
            ->take(5)
            ->get();

        $jumlahPengumuman = Pengumuman::whereHas('ekstrakurikuler.anggota', function ($query) use ($siswa) {
            $query->where('siswa_id', $siswa->id);
        })->count();

        $nilaiAbsensi = Absensi::with(['anggota.ekstrakurikuler'])
            ->whereHas('anggota', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id);
            })
            ->where('status', 'hadir')
            ->whereNotNull('nilai')
            ->latest('tanggal')
            ->take(5)
            ->get();

        $riwayatAbsensi = Absensi::whereHas('anggota', function ($query) use ($siswa) {
            $query->where('siswa_id', $siswa->id);
        })->get(['tanggal', 'status']);

        $dataDashboard = [
            'jumlahEkskul' => $jumlahEkskul,
            'jumlahJadwal' => Jadwal::whereIn('ekskul_id', $ekskulDiikuti)->count(),
            'jumlahPengumuman' => $jumlahPengumuman,
        ];

        return view('dashboard.index', [
            'siswa' => $siswa,
            'ekskul' => $ekskul,
            'jadwalHariIni' => $jadwalHariIni,
            'pengumuman' => $pengumuman,
            'nilaiAbsensi' => $nilaiAbsensi,
            'dataDashboard' => $dataDashboard,
            'chartKehadiran' => $this->buildAttendanceChart($riwayatAbsensi),
            'jumlahHadir' => $riwayatAbsensi->where('status', 'hadir')->count(),
            'jumlahIzin' => $riwayatAbsensi->where('status', 'izin')->count(),
            'jumlahSakit' => $riwayatAbsensi->where('status', 'sakit')->count(),
            'jumlahAlfa' => $riwayatAbsensi->where('status', 'alfa')->count(),
        ]);
    }

    public function pembina()
    {
        abort_unless(
            in_array(Auth::user()?->role, ['pembina', 'admin']),
            403
        );

        $pembina = Auth::user();

        $ekskulDibina = Ekstrakurikuler::where('pembina_id', $pembina->id)->get();
        $ekskulIds = $ekskulDibina->pluck('id');

        $jumlahEkskul = $ekskulDibina->count();
        $anggotaAktif = AnggotaEkskul::whereIn('ekskul_id', $ekskulIds)
            ->where('status', 'aktif')
            ->count();

        $pendingPendaftaran = Pendaftaran::whereIn('ekskul_id', $ekskulIds)
            ->where('status', 'menunggu')
            ->count();

        $riwayatAbsensi = Absensi::whereHas('anggota', function ($query) use ($ekskulIds) {
            $query->whereIn('ekskul_id', $ekskulIds);
        })->get(['tanggal', 'status']);

        $totalAbsensi = $riwayatAbsensi->count();
        $jumlahHadir = $riwayatAbsensi->where('status', 'hadir')->count();
        $jumlahIzin = $riwayatAbsensi->where('status', 'izin')->count();
        $jumlahSakit = $riwayatAbsensi->where('status', 'sakit')->count();
        $jumlahAlfa = $riwayatAbsensi->where('status', 'alfa')->count();

        $rataKehadiran = $totalAbsensi > 0
            ? round(($jumlahHadir / $totalAbsensi) * 100, 1)
            : 0;

        return view('dashboard.pembina', [
            'pembina' => $pembina,
            'ekskulDibina' => $ekskulDibina,
            'jumlahEkskul' => $jumlahEkskul,
            'anggotaAktif' => $anggotaAktif,
            'pendingPendaftaran' => $pendingPendaftaran,
            'totalAbsensi' => $totalAbsensi,
            'rataKehadiran' => $rataKehadiran,
            'chartKehadiran' => $this->buildAttendanceChart($riwayatAbsensi),
            'jumlahHadir' => $jumlahHadir,
            'jumlahIzin' => $jumlahIzin,
            'jumlahSakit' => $jumlahSakit,
            'jumlahAlfa' => $jumlahAlfa,
        ]);
    }

    public function admin()
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $admin = Auth::user();

        $totalPengguna = User::count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalPembina = User::where('role', 'pembina')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalEkskul = Ekstrakurikuler::count();

        $pendingPendaftaran = Pendaftaran::where('status', 'menunggu')->count();

        $totalAbsensi = Absensi::count();
        $totalHadir = Absensi::where('status', 'hadir')->count();
        $rataKehadiran = $totalAbsensi > 0
            ? round(($totalHadir / $totalAbsensi) * 100, 1)
            : 0;

        $periode = $this->monthlyPeriods();
        $start = now()->startOfMonth()->subMonthsNoOverflow(5);

        $pendaftaranPerBulan = array_fill(0, 6, 0);
        foreach (Pendaftaran::where('created_at', '>=', $start)->get(['created_at']) as $item) {
            $index = array_search($item->created_at?->format('Y-m'), $periode['keys'], true);

            if ($index !== false) {
                $pendaftaranPerBulan[$index]++;
            }
        }

        $absensiPerBulan = array_fill(0, 6, 0);
        foreach (Absensi::where('tanggal', '>=', $start)->get(['tanggal']) as $item) {
            $index = array_search($item->tanggal?->format('Y-m'), $periode['keys'], true);

            if ($index !== false) {
                $absensiPerBulan[$index]++;
            }
        }

        $siswaAktif = User::where('role', 'siswa')
            ->where(function ($query) {
                $query->whereNull('status_siswa')
                    ->orWhere('status_siswa', 'aktif');
            })
            ->count();

        $siswaAlumni = User::where('role', 'siswa')
            ->where('status_siswa', 'alumni')
            ->count();

        return view('dashboard.admin', [
            'admin' => $admin,
            'totalPengguna' => $totalPengguna,
            'totalSiswa' => $totalSiswa,
            'totalPembina' => $totalPembina,
            'totalAdmin' => $totalAdmin,
            'totalEkskul' => $totalEkskul,
            'pendingPendaftaran' => $pendingPendaftaran,
            'totalAbsensi' => $totalAbsensi,
            'rataKehadiran' => $rataKehadiran,
            'chartAktivitas' => [
                'labels' => $periode['labels'],
                'pendaftaran' => $pendaftaranPerBulan,
                'absensi' => $absensiPerBulan,
            ],
            'statusAnggota' => [
                'labels' => ['Siswa Aktif', 'Alumni'],
                'data' => [$siswaAktif, $siswaAlumni],
            ],
        ]);
    }
}
