<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_get_all_posts()
    {
        Post::factory()->count(3)->create();

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_create_new_post()
    {
        $data = [
            'user_id' => User::factory()->create()->id,
            'body' => fake()->text(),
        ];

        $response = $this->postJson('/api/posts', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'user_id',
            'body',
        ]);

        $this->assertDatabaseHas('posts', $data);
    }

    public function test_can_update_existing_post()
    {
        $post = Post::factory()->create();

        $data = [
            'user_id' => User::factory()->create()->id,
            'body' => fake()->text(),
        ];

        $response = $this->putJson("/api/posts/{$post->id}", $data);

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'id',
            'user_id',
            'body',
        ]);

        $this->assertDatabaseHas('posts', $data);
    }

    public function test_can_delete_existing_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_cannot_update_post_with_empty_body()
    {
        $post = Post::factory()->create();

        $data = [
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->putJson("/api/posts/{$post->id}", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['body']]);
    }

    public function test_cannot_create_post_with_empty_body()
    {
        $data = [
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->postJson("/api/posts", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['body']]);
    }

    public function test_cannot_delete_non_existent_post()
    {
        $post = Post::factory()->create();
        $post->delete();

        $response = $this->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'Post not found.']);
    }

    public function test_cannot_update_non_existent_post()
    {
        $post = Post::factory()->create();
        $post->delete();

        $data = [
            'user_id' => User::factory()->create()->id,
            'body' => fake()->text(),
        ];

        $response = $this->putJson("/api/posts/{$post->id}", $data);

        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'Post not found.']);
    }

}
