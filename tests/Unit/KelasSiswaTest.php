<?php

namespace Tests\Unit;

use App\Support\KelasSiswa;
use PHPUnit\Framework\TestCase;

class KelasSiswaTest extends TestCase
{
    public function test_daftar_kelas_memakai_angka_romawi(): void
    {
        $semua = KelasSiswa::daftarKelas();

        $this->assertContains('X RPL 1', $semua);
        $this->assertContains('X BRP 7', $semua);
        $this->assertContains('XI DKV 3', $semua);
        $this->assertContains('XII RPL 4', $semua);
        $this->assertNotContains('10 RPL 1', $semua);
        $this->assertNotContains('11 BRP 1', $semua);
        $this->assertCount(13, KelasSiswa::daftarKelas(10));
    }

    public function test_parse_menerima_romawi_dan_kelas_lama_berformat_angka(): void
    {
        $romawi = KelasSiswa::parse('XI RPL 2');
        $lama = KelasSiswa::parse('11 RPL 2');

        $this->assertSame(
            ['tingkat' => 11, 'label' => 'XI', 'jurusan' => 'RPL', 'rombel' => 2],
            $romawi
        );
        $this->assertSame($romawi, $lama);
        $this->assertNull(KelasSiswa::parse('7A'));
        $this->assertNull(KelasSiswa::parse('X RPL'));
    }

    public function test_kelas_berikutnya_dan_tujuan(): void
    {
        $this->assertSame('XI RPL 1', KelasSiswa::berikutnya('X RPL 1'));
        $this->assertSame('XI RPL 1', KelasSiswa::berikutnya('10 RPL 1'));
        $this->assertSame('XII RPL 1', KelasSiswa::berikutnya('XI RPL 1'));
        $this->assertNull(KelasSiswa::berikutnya('XII RPL 1'));

        $this->assertSame('alumni', KelasSiswa::tujuan('XII DKV 1'));
        $this->assertSame('XII DKV 3', KelasSiswa::tujuan('XI DKV 3'));
        $this->assertNull(KelasSiswa::tujuan('X BRP 7'));
    }

    public function test_normalisasi_kelas_lama_ke_romawi(): void
    {
        $this->assertSame('X RPL 1', KelasSiswa::normalisasi('10 RPL 1'));
        $this->assertSame('XII BRP 4', KelasSiswa::normalisasi('12 BRP 4'));
        $this->assertSame('XI DKV 2', KelasSiswa::normalisasi('XI DKV 2'));
        $this->assertNull(KelasSiswa::normalisasi('kelas 1'));
    }
}
