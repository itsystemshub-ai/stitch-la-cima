<?php>

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_be_listed(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($user);
        
        User::factory()->count(3)->create();
        
        $response = $this->get('/users');
        
        $response->assertStatus(200);
    }

    public function test_user_can_be_created(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/users', $userData);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    public function test_user_can_be_updated(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->put("/users/{$user->id}", [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_user_can_be_deleted(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->delete("/users/{$user->id}");

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
