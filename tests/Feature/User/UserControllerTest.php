<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_get_all_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_create_new_user()
    {
        $data = [
            'name' => fake()->name(),
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'name',
        ]);

        $this->assertDatabaseHas('users', $data);
    }

    public function test_can_update_existing_user()
    {
        $user = User::factory()->create();

        $data = [
            'name' => fake()->name(),
        ];

        $response = $this->putJson("/api/users/{$user->id}", $data);

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'id',
            'name',
        ]);

        $this->assertDatabaseHas('users', $data);
    }

    public function test_can_delete_existing_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_cannot_update_user_with_empty_name()
    {
        $user = User::factory()->create();

        $data = [];

        $response = $this->putJson("/api/users/{$user->id}", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['name']]);
    }

    public function test_cannot_create_user_with_empty_body()
    {
        $data = [];

        $response = $this->postJson("/api/users", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['name']]);
    }

    public function test_cannot_delete_non_existent_user()
    {
        $user = User::factory()->create();
        $user->delete();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'User not found.']);
    }

    public function test_cannot_update_non_existent_user()
    {
        $user = User::factory()->create();
        $user->delete();

        $data = [
            'name' => fake()->name(),
        ];

        $response = $this->putJson("/api/users/{$user->id}", $data);

        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'User not found.']);
    }

}
