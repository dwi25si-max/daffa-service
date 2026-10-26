<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index page displays users and partial view sidebar.
     */
    public function test_user_index_screen_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'name'  => 'Test User',
            'email' => 'testuser@example.com',
        ]);

        $response = $this->get(route('user.index'));

        $response->assertStatus(200);
        $response->assertSee('Data Pengguna (User)');
        $response->assertSee('Test User');
        $response->assertSee('testuser@example.com');
        // Check partial view menu is rendered
        $response->assertSee('Data Pelanggan');
        $response->assertSee('Data User');
    }

    /**
     * Test create page can be rendered.
     */
    public function test_user_create_screen_can_be_rendered(): void
    {
        $response = $this->get(route('user.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah User Baru');
        $response->assertSee('Nama Lengkap');
        $response->assertSee('Alamat Email');
        $response->assertSee('Password');
    }

    /**
     * Test validation fails when store fields are empty and errors are returned.
     */
    public function test_validation_fails_when_store_fields_are_empty(): void
    {
        $response = $this->post(route('user.store'), [
            'name'     => '',
            'email'    => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    /**
     * Test successful user creation with Hash::make, redirect and success flash.
     */
    public function test_user_can_be_created_with_hashed_password(): void
    {
        $response = $this->post(route('user.store'), [
            'name'     => 'Budi Pratama',
            'email'    => 'budi.pratama@daffaservice.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success', 'User berhasil ditambahkan!');

        $user = User::where('email', 'budi.pratama@daffaservice.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('Budi Pratama', $user->name);
        $this->assertTrue(Hash::check('secret123', $user->password));
    }

    /**
     * Test edit page can be rendered.
     */
    public function test_user_edit_screen_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'name'  => 'Edit User',
            'email' => 'edituser@example.com',
        ]);

        $response = $this->get(route('user.edit', $user->id));

        $response->assertStatus(200);
        $response->assertSee('Edit User #' . $user->id);
        $response->assertSee('edituser@example.com');
    }

    /**
     * Test user can be updated with new password.
     */
    public function test_user_can_be_updated(): void
    {
        $user = User::factory()->create([
            'name'     => 'Old Name',
            'email'    => 'old@example.com',
            'password' => Hash::make('oldpassword'),
        ]);

        $response = $this->put(route('user.update', $user->id), [
            'name'     => 'Updated Name',
            'email'    => 'updated@example.com',
            'password' => 'newpassword123',
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success', 'Data user berhasil diperbarui!');

        $user->refresh();
        $this->assertEquals('Updated Name', $user->name);
        $this->assertEquals('updated@example.com', $user->email);
        $this->assertTrue(Hash::check('newpassword123', $user->password));
    }

    /**
     * Test user can be deleted.
     */
    public function test_user_can_be_deleted(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('user.destroy', $user->id));

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success', 'Data user berhasil dihapus!');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}

