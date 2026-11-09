<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class KenaikanKelasController extends Controller
{
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

    public function index()
    {
        $admin = Auth::user();

        $siswa = DB::table('user')
            ->where('role', 'siswa')
            ->get();

        $jumlahAktif = $siswa->filter(function ($item) {
            return ($item->status_siswa ?? 'aktif') === 'aktif';
        })->count();

        $jumlahAlumni = $siswa->where('status_siswa', 'alumni')->count();

        $jumlahPerKelas = $siswa
            ->filter(function ($item) {
                return ($item->status_siswa ?? 'aktif') === 'aktif';
            })
            ->groupBy('kelas');

        $riwayat = DB::table('kenaikan_kelas_logs')
            ->orderByDesc('tahun_ajaran')
            ->get();

        return view('admin.kenaikan-kelas', compact(
            'admin',
            'jumlahAktif',
            'jumlahAlumni',
            'jumlahPerKelas',
            'riwayat'
        ));
    }

    public function proses(Request $request)
    {
        $data = $request->validate([
            'tahun_ajaran' => [
                'required',
                'regex:/^\d{4}\/\d{4}$/',
            ],
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahun_ajaran.regex' => 'Format tahun ajaran harus seperti 2026/2027.',
        ]);

        $hasil = DB::transaction(function () use ($data) {
            $sudahDiproses = DB::table('kenaikan_kelas_logs')
                ->where('tahun_ajaran', $data['tahun_ajaran'])
                ->exists();

            if ($sudahDiproses) {
                throw ValidationException::withMessages([
                    'tahun_ajaran' => 'Kenaikan kelas untuk tahun ajaran ini sudah pernah diproses.',
                ]);
            }

            $siswa = DB::table('user')
                ->where('role', 'siswa')
                ->where(function ($query) {
                    $query->whereNull('status_siswa')
                        ->orWhere('status_siswa', 'aktif');
                })
                ->lockForUpdate()
                ->get();

            $jumlahNaik = 0;
            $jumlahAlumni = 0;
            $kelasValid = $this->daftarKelas();

            foreach ($siswa as $item) {
                if (!in_array($item->kelas, $kelasValid, true)) {
                    continue;
                }

                preg_match(
                    '/^(10|11|12) (RPL|BRP|DKV) (\d+)$/',
                    $item->kelas,
                    $bagian
                );

                $tingkat = (int) $bagian[1];
                $jurusan = $bagian[2];
                $rombel = $bagian[3];

                if ($tingkat === 12) {
                    DB::table('user')
                        ->where('id', $item->id)
                        ->update([
                            'status_siswa' => 'alumni',
                            'updated_at' => now(),
                        ]);

                    $jumlahAlumni++;
                    continue;
                }

                $kelasBaru = ($tingkat + 1) . " $jurusan $rombel";

                DB::table('user')
                    ->where('id', $item->id)
                    ->update([
                        'kelas' => $kelasBaru,
                        'status_siswa' => 'aktif',
                        'updated_at' => now(),
                    ]);

                $jumlahNaik++;
            }

            DB::table('kenaikan_kelas_logs')->insert([
                'tahun_ajaran' => $data['tahun_ajaran'],
                'admin_id' => Auth::id(),
                'jumlah_naik' => $jumlahNaik,
                'jumlah_alumni' => $jumlahAlumni,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

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