<?php

namespace Tests\Feature;

use App\Models\Absensi;
use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AbsensiUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_absensi_tanggal_sama_diperbarui_bukan_gagal(): void
    {
        $pembina = User::create([
            'name' => 'Pembina Absensi',
            'nama' => 'Pembina Absensi',
            'email' => 'pembina-absensi@example.test',
            'password' => 'rahasia123',
            'role' => 'pembina',
        ]);

        $siswa = User::create([
            'name' => 'Siswa Absensi',
            'nama' => 'Siswa Absensi',
            'email' => 'siswa-absensi@example.test',
            'password' => 'rahasia123',
            'role' => 'siswa',
        ]);

        $ekskul = Ekstrakurikuler::create([
            'nama_ekskul' => 'Ekskul Absensi',
            'pembina_id' => $pembina->id,
        ]);

        $anggota = AnggotaEkskul::create([
            'siswa_id' => $siswa->id,
            'ekskul_id' => $ekskul->id,
            'tanggal_daftar' => now()->toDateString(),
            'status' => 'aktif',
        ]);

        Absensi::create([
            'anggota_id' => $anggota->id,
            'tanggal' => now()->toDateString(),
            'status' => 'hadir',
            'nilai' => 80,
        ]);

        $this->actingAs($pembina);

        $response = $this->post('/pembina/absensi', [
            'anggota_id' => $anggota->id,
            'tanggal' => now()->toDateString(),
            'status' => 'hadir',
            'nilai' => 95,
            'keterangan' => 'Diperbarui.',
        ]);

        $response->assertRedirect();
        $this->assertSame(
            1,
            Absensi::where('anggota_id', $anggota->id)->count(),
            'Absensi tanggal yang sama seharusnya diperbarui, bukan dibuat duplikat.'
        );
        $this->assertDatabaseHas('absensi', [
            'anggota_id' => $anggota->id,
            'nilai' => 95,
        ]);
    }
}
