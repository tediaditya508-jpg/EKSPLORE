<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class KenaikanKelasController extends Controller
{
    /**
     * Daftar kelas yang dikenali oleh sistem kenaikan kelas.
     */
    private function daftarKelas(): array
    {
        $kelas = [];

        foreach ([10, 11, 12] as $tingkat) {
            foreach ([
                'RPL' => 4,
                'BRP' => $tingkat === 10 ? 7 : 6,
                'DKV' => $tingkat === 10 ? 2 : 3,
            ] as $jurusan => $jumlah) {
                for ($i = 1; $i <= $jumlah; $i++) {
                    $kelas[] = "$tingkat $jurusan $i";
                }
            }
        }

        return $kelas;
    }

    /**
     * Kelas lanjutan untuk satu tingkat, tanpa memeriksa ketersediaan.
     * Mengembalikan null untuk kelas 12 karena keluar dari daftar kelas.
     */
    private function kelasBerikutnya(?string $kelas): ?string
    {
        if (! is_string($kelas)
            || ! preg_match('/^(10|11|12) (RPL|BRP|DKV) (\d+)$/', $kelas, $bagian)) {
            return null;
        }

        $tingkat = (int) $bagian[1];

        if ($tingkat === 12) {
            return null;
        }

        return ($tingkat + 1)." {$bagian[2]} {$bagian[3]}";
    }

    /**
     * Tujuan proses kenaikan: nama kelas lanjutan yang valid atau "alumni".
     * Null berarti kelas saat ini tidak valid atau kelas tujuannya tidak tersedia.
     */
    private function kelasTujuan(?string $kelas): ?string
    {
        if (! is_string($kelas)
            || ! preg_match('/^(10|11|12) (RPL|BRP|DKV) (\d+)$/', $kelas, $bagian)) {
            return null;
        }

        if ((int) $bagian[1] === 12) {
            return 'alumni';
        }

        $tujuan = $this->kelasBerikutnya($kelas);

        return in_array($tujuan, $this->daftarKelas(), true) ? $tujuan : null;
    }

    /**
     * Query siswa yang masih aktif (termasuk data lama tanpa status).
     */
    private function siswaAktifQuery()
    {
        return DB::table('user')
            ->where('role', 'siswa')
            ->where(function ($query) {
                $query->whereNull('status_siswa')
                    ->orWhere('status_siswa', 'aktif');
            });
    }

    public function index()
    {
        $admin = Auth::user();
        $kelasValid = $this->daftarKelas();

        $siswa = DB::table('user')
            ->where('role', 'siswa')
            ->get(['id', 'name', 'email', 'kelas', 'status_siswa']);

        $siswaAktif = $siswa->filter(function ($item) {
            return ($item->status_siswa ?? 'aktif') === 'aktif';
        });

        $jumlahAktif = $siswaAktif->count();
        $jumlahAlumni = $siswa->where('status_siswa', 'alumni')->count();

        $siswaTanpaKelas = $siswaAktif
            ->filter(function ($item) use ($kelasValid) {
                return ! in_array($item->kelas, $kelasValid, true);
            })
            ->sortBy('name')
            ->values();

        // Siswa dengan kelas saat ini valid, tetapi kelas tujuannya tidak ada.
        // Contoh: 10 BRP 7 -> 11 BRP 7, sedangkan BRP 11 hanya rombel 1-6.
        $siswaTujuanTidakValid = $siswaAktif
            ->filter(function ($item) use ($kelasValid) {
                return in_array($item->kelas, $kelasValid, true)
                    && $this->kelasTujuan($item->kelas) === null;
            })
            ->sortBy('name')
            ->values();

        $siswaPerluPenempatan = $siswaTanpaKelas
            ->map(function ($item) use ($kelasValid) {
                return (object) [
                    'id' => $item->id,
                    'name' => $item->name,
                    'email' => $item->email,
                    'kelas' => $item->kelas,
                    'masalah' => 'kelas',
                    'tujuan' => null,
                    'opsi' => $kelasValid,
                ];
            })
            ->concat($siswaTujuanTidakValid->map(function ($item) use ($kelasValid) {
                $tingkat = explode(' ', $item->kelas)[0];

                $opsi = array_values(array_filter(
                    $kelasValid,
                    function ($kelas) use ($tingkat) {
                        return str_starts_with($kelas, $tingkat.' ')
                            && $this->kelasTujuan($kelas) !== null;
                    }
                ));

                return (object) [
                    'id' => $item->id,
                    'name' => $item->name,
                    'email' => $item->email,
                    'kelas' => $item->kelas,
                    'masalah' => 'tujuan',
                    'tujuan' => $this->kelasBerikutnya($item->kelas),
                    'opsi' => $opsi,
                ];
            }))
            ->sortBy('name')
            ->values();

        $jumlahSiapProses = $jumlahAktif - $siswaPerluPenempatan->count();

        $jumlahPerKelas = $siswaAktif
            ->groupBy(function ($item) use ($kelasValid) {
                return in_array($item->kelas, $kelasValid, true)
                    ? $item->kelas
                    : 'Belum mengisi kelas';
            })
            ->sortKeys(SORT_NATURAL);

        $riwayat = DB::table('kenaikan_kelas_logs as logs')
            ->leftJoin('user as admin_user', 'admin_user.id', '=', 'logs.admin_id')
            ->select('logs.*', 'admin_user.name as admin_name')
            ->orderByDesc('logs.tahun_ajaran')
            ->orderByDesc('logs.id')
            ->get();

        return view('admin.kenaikan-kelas', compact(
            'admin',
            'jumlahAktif',
            'jumlahAlumni',
            'jumlahSiapProses',
            'siswaTanpaKelas',
            'siswaTujuanTidakValid',
            'siswaPerluPenempatan',
            'jumlahPerKelas',
            'riwayat',
            'kelasValid'
        ));
    }

    /**
     * Atur kelas siswa yang belum memiliki kelas valid.
     */
    public function updateKelas(Request $request, $id)
    {
        $data = $request->validate([
            'kelas' => [
                'required',
                'string',
                Rule::in($this->daftarKelas()),
            ],
        ], [
            'kelas.required' => 'Kelas wajib dipilih.',
            'kelas.in' => 'Kelas yang dipilih tidak valid.',
        ]);

        $siswa = DB::table('user')
            ->where('id', $id)
            ->where('role', 'siswa')
            ->first();

        if (! $siswa) {
            abort(404);
        }

        if (($siswa->status_siswa ?? 'aktif') !== 'aktif') {
            return redirect()
                ->route('admin.kenaikan-kelas')
                ->withFragment('penempatan-kelas')
                ->withErrors([
                    'kelas' => 'Kelas hanya dapat diatur untuk siswa aktif.',
                ]);
        }

        DB::table('user')
            ->where('id', $siswa->id)
            ->update([
                'kelas' => $data['kelas'],
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('admin.kenaikan-kelas')
            ->withFragment('penempatan-kelas')
            ->with(
                'success',
                "Kelas {$siswa->name} berhasil diatur ke {$data['kelas']}."
            );
    }

    public function proses(Request $request)
    {
        $data = $request->validate([
            'tahun_ajaran' => [
                'required',
                'regex:/^\d{4}\/\d{4}$/',
                function (string $attribute, mixed $value, \Closure $fail) {
                    $tahunAwal = (int) substr($value, 0, 4);
                    $tahunAkhir = (int) substr($value, 5, 4);

                    if ($tahunAkhir !== $tahunAwal + 1) {
                        $fail('Tahun ajaran harus berurutan, contoh 2026/2027.');
                    }
                },
            ],
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahun_ajaran.regex' => 'Format tahun ajaran harus seperti 2026/2027.',
        ]);

        $hasil = DB::transaction(function () use ($data) {
            $tahunTerakhir = DB::table('kenaikan_kelas_logs')
                ->where(function ($query) {
                    $query->where('jumlah_naik', '>', 0)
                        ->orWhere('jumlah_alumni', '>', 0);
                })
                ->max('tahun_ajaran');

            if ($tahunTerakhir !== null && strcmp($data['tahun_ajaran'], $tahunTerakhir) < 0) {
                throw ValidationException::withMessages([
                    'tahun_ajaran' => "Tahun ajaran harus setelah tahun ajaran terakhir yang sudah diproses ({$tahunTerakhir}).",
                ]);
            }

            $log = DB::table('kenaikan_kelas_logs')
                ->where('tahun_ajaran', $data['tahun_ajaran'])
                ->first();

            if ($log) {
                $logKosong = (int) $log->jumlah_naik === 0
                    && (int) $log->jumlah_alumni === 0;

                if (! $logKosong) {
                    throw ValidationException::withMessages([
                        'tahun_ajaran' => 'Kenaikan kelas untuk tahun ajaran ini sudah pernah diproses.',
                    ]);
                }

                // Log tanpa perubahan tidak boleh mengunci tahun ajaran.
                DB::table('kenaikan_kelas_logs')
                    ->where('id', $log->id)
                    ->delete();
            }

            $siswa = $this->siswaAktifQuery()
                ->lockForUpdate()
                ->get();

            if ($siswa->isEmpty()) {
                throw ValidationException::withMessages([
                    'proses' => 'Tidak ada siswa aktif yang dapat diproses.',
                ]);
            }

            $kelasValid = $this->daftarKelas();
            $tidakValid = $siswa->filter(function ($item) use ($kelasValid) {
                return ! in_array($item->kelas, $kelasValid, true);
            });

            if ($tidakValid->isNotEmpty()) {
                $nama = $tidakValid->take(3)->pluck('name')->implode(', ');
                $sisa = $tidakValid->count() > 3
                    ? ' dan '.($tidakValid->count() - 3).' siswa lainnya'
                    : '';

                throw ValidationException::withMessages([
                    'proses' => "Ada {$tidakValid->count()} siswa aktif yang belum memiliki kelas valid ({$nama}{$sisa}). Lengkapi penempatan kelas terlebih dahulu.",
                ]);
            }

            $tujuanTidakTersedia = $siswa->filter(function ($item) {
                return $this->kelasTujuan($item->kelas) === null;
            });

            if ($tujuanTidakTersedia->isNotEmpty()) {
                $rincian = $tujuanTidakTersedia->take(3)->map(function ($item) {
                    $tujuan = $this->kelasBerikutnya($item->kelas);

                    return "{$item->name} ({$item->kelas} → {$tujuan})";
                })->implode(', ');

                $sisa = $tujuanTidakTersedia->count() > 3
                    ? ' dan '.($tujuanTidakTersedia->count() - 3).' siswa lainnya'
                    : '';

                throw ValidationException::withMessages([
                    'proses' => "Ada {$tujuanTidakTersedia->count()} siswa dengan kelas tujuan yang tidak tersedia ({$rincian}{$sisa}). Sesuaikan kelas siswa melalui panel penempatan kelas terlebih dahulu.",
                ]);
            }

            $jumlahNaik = 0;
            $jumlahAlumni = 0;

            foreach ($siswa as $item) {
                $tujuan = $this->kelasTujuan($item->kelas);

                if ($tujuan === 'alumni') {
                    DB::table('user')
                        ->where('id', $item->id)
                        ->update([
                            'status_siswa' => 'alumni',
                            'updated_at' => now(),
                        ]);

                    $jumlahAlumni++;

                    continue;
                }

                DB::table('user')
                    ->where('id', $item->id)
                    ->update([
                        'kelas' => $tujuan,
                        'status_siswa' => 'aktif',
                        'updated_at' => now(),
                    ]);

                $jumlahNaik++;
            }

            $tersimpan = DB::table('kenaikan_kelas_logs')->insertOrIgnore([
                'tahun_ajaran' => $data['tahun_ajaran'],
                'admin_id' => Auth::id(),
                'jumlah_naik' => $jumlahNaik,
                'jumlah_alumni' => $jumlahAlumni,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($tersimpan === 0) {
                throw ValidationException::withMessages([
                    'tahun_ajaran' => 'Kenaikan kelas untuk tahun ajaran ini sudah pernah diproses.',
                ]);
            }

            return compact('jumlahNaik', 'jumlahAlumni');
        });

        return redirect()
            ->route('admin.kenaikan-kelas')
            ->with(
                'success',
                "Berhasil! {$hasil['jumlahNaik']} siswa naik kelas dan {$hasil['jumlahAlumni']} siswa menjadi alumni."
            );
    }
}
