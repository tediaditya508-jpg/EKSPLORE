<?php
namespace Tests\Feature;

use Tests\TestCase;

class LoginPagesTest extends TestCase
{
    public function test_halaman_login_siswa_dapat_diakses(): void
    {
        $this->get('/login')->assertOk();
    }

    public function test_halaman_login_pembina_dapat_diakses(): void
    {
        $this->get('/pembina/login')->assertOk();
    }

    public function test_halaman_login_admin_dapat_diakses(): void
    {
        $this->get('/admin/login')->assertOk();
    }
}