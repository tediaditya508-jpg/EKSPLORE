<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class KelasRomawiTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_register_menampilkan_kelas_romawi(): void
    {
        $this->get('/register')
            ->assertOk()
            ->assertSee('X RPL 1')
            ->assertSee('X BRP 7')
            ->assertSee('X DKV 1')
            ->assertDontSee('10 RPL 1')
            ->assertDontSee('10 BRP 1')
            ->assertDontSee('10 DKV 1');
    }

    public function test_register_menolak_kelas_berformat_angka(): void
    {
        $this->post('/register', $this->dataRegister(['kelas' => '10 RPL 1']))
            ->assertSessionHasErrors('kelas');
    }

    public function test_register_menerima_kelas_romawi(): void
    {
        $this->post('/register', $this->dataRegister(['kelas' => 'X RPL 1']))
            ->assertRedirect(route('register.google.start'))
            ->assertSessionHasNoErrors();

        $this->assertSame(
            'X RPL 1',
            $this->app['session']->get('register_pending.kelas')
        );
    }

    public function test_kenaikan_kelas_menerima_kelas_lama_dan_menyimpan_hasil_romawi(): void
    {
        $admin = $this->buatUser('Admin Romawi', 'admin-romawi@example.test', 'admin');

        $siswaLama = $this->buatUser('Siswa Lama', 'siswa-lama@example.test', 'siswa', '10 RPL 1');
        $siswaAlumni = $this->buatUser('Siswa Alumni', 'siswa-alumni@example.test', 'siswa', '12 RPL 1');

        $this->actingAs($admin)
            ->post(route('admin.kenaikan-kelas.proses'), ['tahun_ajaran' => '2026/2027'])
            ->assertRedirect(route('admin.kenaikan-kelas'))
            ->assertSessionHasNoErrors();

        $this->assertSame(
            'XI RPL 1',
            DB::table('user')->where('id', $siswaLama->id)->value('kelas')
        );
        $this->assertSame(
            'alumni',
            DB::table('user')->where('id', $siswaAlumni->id)->value('status_siswa')
        );
    }

    /**
     * @param array<string, mixed> $tambahan
     * @return array<string, mixed>
     */
    private function dataRegister(array $tambahan = []): array
    {
        return array_merge([
            'name' => 'Siswa Romawi',
            'nis' => '12345678',
            'kelas' => 'X RPL 1',
            'no_hp' => '08123456789',
            'email' => 'siswa.romawi@gmail.com',
            'password' => 'Rahasia123',
            'password_confirmation' => 'Rahasia123',
        ], $tambahan);
    }

    private function buatUser(string $nama, string $email, string $role, ?string $kelas = null): User
    {
        return User::create([
            'name' => $nama,
            'nama' => $nama,
            'email' => $email,
            'password' => 'rahasia123',
            'role' => $role,
            'kelas' => $kelas,
        ]);
    }
}
