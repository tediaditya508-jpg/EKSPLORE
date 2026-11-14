<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    private function buatPengguna(string $role): User
    {
        return User::create([
            'name' => 'Pengguna Tes',
            'nama' => 'Pengguna Tes',
            'email' => $role . '@example.test',
            'password' => 'password-tes-123',
            'role' => $role,
        ]);
    }

    public function test_siswa_hanya_boleh_membuka_dashboard_siswa(): void
    {
        $siswa = $this->buatPengguna('siswa');

        $this->actingAs($siswa);

        $this->get('/pembina/dashboard')->assertForbidden();
        $this->get('/admin/dashboard')->assertForbidden();
    }

    public function test_pembina_hanya_boleh_membuka_dashboard_pembina(): void
    {
        $pembina = $this->buatPengguna('pembina');

        $this->actingAs($pembina);

        $this->get('/dashboard')->assertForbidden();
        $this->get('/admin/dashboard')->assertForbidden();
    }

    public function test_admin_boleh_membuka_semua_dashboard(): void
    {
        $admin = $this->buatPengguna('admin');

        $this->actingAs($admin);

        $this->get('/dashboard')->assertOk();
        $this->get('/pembina/dashboard')->assertOk();
        $this->get('/admin/dashboard')->assertOk();
    }

    public function test_siswa_dan_pembina_tidak_boleh_mengakses_pindah_ekskul_admin(): void
    {
        foreach (['siswa', 'pembina'] as $role) {
            $pengguna = $this->buatPengguna($role);

            $this->actingAs($pengguna)
                ->get('/admin/pindah-ekskul')
                ->assertForbidden();

            $this->actingAs($pengguna)
                ->put('/admin/pindah-ekskul/1', ['status' => 'ditolak'])
                ->assertForbidden();
        }
    }
}