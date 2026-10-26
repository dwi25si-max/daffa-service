<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestAuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Soal 1: Test Home ( / ) renders with PartialView navbar.
     */
    public function test_home_page_renders_with_partial_navbar(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Selamat Datang di Daffa Service');
        // Pastikan partial view navbar tampil
        $response->assertSee('Home');
        $response->assertSee('Login');
        $response->assertSee('Register');
    }

    /**
     * Soal 1: Test Login ( /auth ) renders with Username & Password inputs.
     */
    public function test_login_page_renders_with_required_inputs(): void
    {
        $response = $this->get('/auth');

        $response->assertStatus(200);
        $response->assertSee('Halaman Login');
        // Inputan yang tersedia
        $response->assertSee('name="username"', false);
        $response->assertSee('name="password"', false);
    }

    /**
     * Soal 1: Test Register ( /register ) renders with Name, Email, Password, Confirm Password.
     */
    public function test_register_page_renders_with_required_inputs(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Halaman Register');
        // Inputan yang tersedia
        $response->assertSee('name="name"', false);
        $response->assertSee('name="email"', false);
        $response->assertSee('name="password"', false);
        $response->assertSee('name="password_confirmation"', false);
    }

    /**
     * Soal 2: Jika username dan password sama, arahkan ke halaman Dashboard Admin.
     */
    public function test_login_succeeds_when_username_and_password_match(): void
    {
        $response = $this->post('/auth', [
            'username' => 'daffa_admin',
            'password' => 'daffa_admin',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('is_admin', true);
        $response->assertSessionHas('logged_user', 'daffa_admin');
    }

    /**
     * Soal 2: Jika salah, arahkan kembali ke halaman Login dengan Alert.
     */
    public function test_login_fails_when_username_and_password_differ(): void
    {
        $response = $this->from('/auth')->post('/auth', [
            'username' => 'daffa_admin',
            'password' => 'passwordBerbeda',
        ]);

        $response->assertRedirect('/auth');
        $response->assertSessionHas('alert', 'Username dan Password tidak cocok!');
    }

    /**
     * Test Dashboard Admin page renders.
     */
    public function test_admin_dashboard_renders(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Dashboard Administrator');
        $response->assertSee('Total Pelanggan');
        $response->assertSee('Total Pengguna (User)');
    }
}

