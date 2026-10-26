<?php

namespace Tests\Feature;

use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PelangganCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_pelanggan_index_renders_with_partial_view(): void
    {
        $response = $this->get(route('pelanggan.index'));

        $response->assertStatus(200);
        $response->assertSee('Data Pelanggan Daffa Service');
        $response->assertSee('Data Pelanggan');
        $response->assertSee('Data User');
    }

    public function test_pelanggan_create_renders(): void
    {
        $response = $this->get(route('pelanggan.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Pelanggan Baru');
    }
}

