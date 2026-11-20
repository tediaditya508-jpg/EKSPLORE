<?php

namespace App\Support;

/**
 * Aturan penamaan kelas siswa.
 *
 * Tingkat kelas ditulis dengan angka Romawi (X, XI, XII),
 * sedangkan nomor rombel tetap memakai angka (mis. X RPL 1).
 */
class KelasSiswa
{
    /** @var array<int, string> */
    private const ROMAWI = [
        10 => 'X',
        11 => 'XI',
        12 => 'XII',
    ];

    /** @var array<string, int> */
    private const TINGKAT = [
        'X' => 10,
        'XI' => 11,
        'XII' => 12,
        '10' => 10,
        '11' => 11,
        '12' => 12,
    ];

    /** @var array<int, array<string, int>> */
    private const ROMBEL = [
        10 => ['RPL' => 4, 'BRP' => 7, 'DKV' => 2],
        11 => ['RPL' => 4, 'BRP' => 6, 'DKV' => 3],
        12 => ['RPL' => 4, 'BRP' => 6, 'DKV' => 3],
    ];

    public static function labelTingkat(int $tingkat): ?string
    {
        return self::ROMAWI[$tingkat] ?? null;
    }

    /**
     * Daftar kelas dalam format romawi.
     * Jika $tingkat diisi, hanya kelas pada tingkat tersebut yang dikembalikan.
     *
     * @return array<int, string>
     */
    public static function daftarKelas(?int $tingkat = null): array
    {
        $daftarTingkat = $tingkat === null ? array_keys(self::ROMAWI) : [$tingkat];
        $kelas = [];

        foreach ($daftarTingkat as $t) {
            if (! isset(self::ROMAWI[$t], self::ROMBEL[$t])) {
                continue;
            }

            foreach (self::ROMBEL[$t] as $jurusan => $jumlah) {
                for ($i = 1; $i <= $jumlah; $i++) {
                    $kelas[] = self::ROMAWI[$t].' '.$jurusan.' '.$i;
                }
            }
        }

        return $kelas;
    }

    /**
     * Urai kelas romawi maupun kelas lama berformat angka.
     *
     * @return array{tingkat: int, label: string, jurusan: string, rombel: int}|null
     */
    public static function parse(?string $kelas): ?array
    {
        if (! is_string($kelas)) {
            return null;
        }

        $kelas = trim($kelas);

        if (! preg_match('/^(XII|XI|X|12|11|10) (RPL|BRP|DKV) ([1-9][0-9]*)$/', $kelas, $bagian)) {
            return null;
        }

        $tingkat = self::TINGKAT[$bagian[1]] ?? null;

        if ($tingkat === null) {
            return null;
        }

        return [
            'tingkat' => $tingkat,
            'label' => self::ROMAWI[$tingkat],
            'jurusan' => $bagian[2],
            'rombel' => (int) $bagian[3],
        ];
    }

    /**
     * Kelas lanjutan satu tingkat, dalam format romawi.
     * Null untuk kelas XII.
     */
    public static function berikutnya(?string $kelas): ?string
    {
        $parsed = self::parse($kelas);

        if ($parsed === null || $parsed['tingkat'] >= 12) {
            return null;
        }

        return self::ROMAWI[$parsed['tingkat'] + 1]
            .' '.$parsed['jurusan'].' '.$parsed['rombel'];
    }

    /**
     * Tujuan kenaikan kelas: kelas romawi yang tersedia, "alumni", atau null
     * bila kelas saat ini tidak dikenali / rombel tujuannya tidak ada.
     */
    public static function tujuan(?string $kelas): ?string
    {
        $parsed = self::parse($kelas);

        if ($parsed === null) {
            return null;
        }

        if ($parsed['tingkat'] === 12) {
            return 'alumni';
        }

        $tujuan = self::berikutnya($kelas);

        return in_array($tujuan, self::daftarKelas(), true) ? $tujuan : null;
    }

    /**
     * Ubah kelas lama berformat angka ke format romawi.
     */
    public static function normalisasi(?string $kelas): ?string
    {
        $parsed = self::parse($kelas);

        if ($parsed === null) {
            return null;
        }

        return $parsed['label'].' '.$parsed['jurusan'].' '.$parsed['rombel'];
    }
}
