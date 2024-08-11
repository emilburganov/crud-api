<?php

namespace Tests\Feature\Comment;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_get_all_comment()
    {
        Comment::factory()->count(3)->create();

        $response = $this->getJson('/api/comments');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_create_new_comment()
    {
        $data = [
            'post_id' => Post::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'body' => fake()->text(),
        ];

        $response = $this->postJson('/api/comments', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'post_id',
            'user_id',
            'body',
        ]);

        $this->assertDatabaseHas('comments', $data);
    }

    public function test_can_update_existing_comment()
    {
        $comment = Comment::factory()->create();

        $data = [
            'post_id' => Post::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'body' => fake()->text(),
        ];

        $response = $this->putJson("/api/comments/{$comment->id}", $data);

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'id',
            'post_id',
            'user_id',
            'body',
        ]);

        $this->assertDatabaseHas('comments', $data);
    }

    public function test_can_delete_existing_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->deleteJson("/api/comments/{$comment->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }

    public function test_cannot_update_comment_with_empty_body()
    {
        $comment = Comment::factory()->create();

        $data = [
            'post_id' => Post::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->putJson("/api/comments/{$comment->id}", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['body']]);
    }

    public function test_cannot_create_comment_with_empty_body()
    {
        $data = [
            'post_id' => Post::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->postJson("/api/comments", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['body']]);
    }

    public function test_cannot_delete_non_existent_comment()
    {
        $comment = Comment::factory()->create();
        $comment->delete();

        $response = $this->deleteJson("/api/comments/{$comment->id}");

        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'Comment not found.']);
    }

    public function test_cannot_update_non_existent_comment()
    {
        $comment = Comment::factory()->create();
        $comment->delete();

        $data = [
            'post_id' => Post::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'body' => fake()->text(),
        ];

        $response = $this->putJson("/api/comments/{$comment->id}", $data);

        $response->assertStatus(404);
        $response->assertExactJson(['message' => 'Comment not found.']);
    }

}
