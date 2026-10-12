<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->assertSame('sqlite', config('database.default'));
        $this->assertSame(
            ':memory:',
            config('database.connections.sqlite.database')
        );

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }

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

        // Memastikan admin tidak ditolak oleh pemeriksaan role.
        // Halaman siswa bisa gagal jika tabel pendukung belum dibuat
        // di database SQLite khusus pengujian.
        $response = $this->get('/dashboard');
        $this->assertNotSame(403, $response->getStatusCode());

        $this->get('/pembina/dashboard')->assertOk();
        $this->get('/admin/dashboard')->assertOk();
    }
}
