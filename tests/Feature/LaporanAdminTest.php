<?php

namespace Tests\Feature;

use App\Models\Absensi;
use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use App\Models\LaporanSiswa;
use App\Models\Pendaftaran;
use App\Models\RiwayatLaporan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaporanAdminTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private User $siswa;
    private Ekstrakurikuler $ekskul;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Laporan',
            'nama' => 'Admin Laporan',
            'email' => 'admin-laporan@example.test',
            'password' => 'rahasia123',
            'role' => 'admin',
        ]);

        $this->siswa = User::create([
            'name' => 'Siswa Laporan',
            'nama' => 'Siswa Laporan',
            'email' => 'siswa-laporan@example.test',
            'password' => 'rahasia123',
            'role' => 'siswa',
            'nis' => '12345',
            'kelas' => '7A',
        ]);

        $this->ekskul = Ekstrakurikuler::create([
            'nama_ekskul' => 'Pramuka',
            'pembina_id' => $this->admin->id,
        ]);

        Pendaftaran::create([
            'siswa_id' => $this->siswa->id,
            'ekskul_id' => $this->ekskul->id,
            'nama' => $this->siswa->nama,
            'kelas' => '7A',
            'nis' => '12345',
            'no_hp' => '08123456789',
            'alasan' => 'Ingin belajar.',
            'status' => 'diterima',
        ]);

        $anggota = AnggotaEkskul::create([
            'siswa_id' => $this->siswa->id,
            'ekskul_id' => $this->ekskul->id,
            'tanggal_daftar' => now()->toDateString(),
            'status' => 'aktif',
        ]);

        Absensi::create([
            'anggota_id' => $anggota->id,
            'tanggal' => now()->toDateString(),
            'status' => 'hadir',
            'nilai' => 90,
        ]);

        $this->actingAs($this->admin);
    }

    public function test_halaman_data_laporan_bisa_dibuka_untuk_semua_jenis(): void
    {
        foreach (['pendaftaran', 'anggota', 'absensi'] as $jenis) {
            $this->get('/admin/laporan?jenis_laporan=' . $jenis)
                ->assertOk("Halaman laporan jenis {$jenis} gagal dibuka.")
                ->assertSee('Data Laporan')
                ->assertDontSee('[cite:', 'Blade masih mengandung teks sitasi sampah.');
        }
    }

    public function test_filter_pencarian_berfungsi_di_semua_jenis(): void
    {
        $kasus = [
            ['pendaftaran', 'Siswa'],
            ['anggota', '12345'],
            ['absensi', 'Siswa'],
        ];

        foreach ($kasus as [$jenis, $cari]) {
            $this->get('/admin/laporan?' . http_build_query([
                'jenis_laporan' => $jenis,
                'cari' => $cari,
            ]))
                ->assertOk("Filter pencarian jenis {$jenis} menghasilkan error.")
                ->assertSee('Siswa Laporan');
        }

        $this->get('/admin/laporan?' . http_build_query([
            'jenis_laporan' => 'pendaftaran',
            'cari' => 'TidakAda',
        ]))
            ->assertOk()
            ->assertSee('Data Laporan Tidak Ditemukan');
    }

    public function test_filter_lengkap_tidak_menghasilkan_error(): void
    {
        $this->get('/admin/laporan?' . http_build_query([
            'jenis_laporan' => 'pendaftaran',
            'cari' => 'Siswa',
            'ekskul_id' => $this->ekskul->id,
            'kelas' => '7A',
            'status' => 'diterima',
            'tanggal_awal' => now()->subDay()->toDateString(),
            'tanggal_akhir' => now()->addDay()->toDateString(),
        ]))
            ->assertOk()
            ->assertSee('Siswa Laporan');
    }

    public function test_simpan_riwayat_laporan(): void
    {
        $this->post('/admin/laporan/riwayat', [
            'jenis_laporan' => 'pendaftaran',
            'cari' => 'Siswa',
            'ekskul_id' => $this->ekskul->id,
            'status' => 'diterima',
        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('riwayat_laporan', [
            'admin_id' => $this->admin->id,
            'jenis_laporan' => 'pendaftaran',
            'jumlah_data' => 1,
        ]);

        $this->assertSame(1, RiwayatLaporan::count());
    }

    public function test_kirim_laporan_ke_siswa_dan_update_status(): void
    {
        $this->post('/admin/laporan/siswa', [
            'siswa_id' => $this->siswa->id,
            'judul' => 'Peringatan absensi',
            'pesan' => 'Mohon hadir tepat waktu.',
        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $laporan = LaporanSiswa::firstOrFail();

        $this->assertSame('Belum Ditinjau', $laporan->status);
        $this->assertDatabaseHas('notifikasi', ['user_id' => $this->siswa->id]);
        $this->assertDatabaseHas('riwayat_laporan', [
            'jenis_laporan' => 'Laporan Siswa',
            'filter' => 'Mohon hadir tepat waktu.',
        ]);

        $this->patch('/admin/laporan/siswa/' . $laporan->id . '/status', [
            'status' => 'Selesai',
        ])->assertRedirect();

        $this->assertDatabaseHas('laporan_siswa', [
            'id' => $laporan->id,
            'status' => 'Selesai',
        ]);
    }

    public function test_halaman_laporan_menampilkan_form_simpan_riwayat(): void
    {
        $this->get('/admin/laporan')
            ->assertOk()
            ->assertSee(route('admin.laporan.riwayat.simpan'), false)
            ->assertSee('Simpan Riwayat Laporan');
    }
}
