<?php

namespace App\Services\Post;

use App\DTOs\Post\PostFormDTO;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Post::all();
    }

    /**
     * @param PostFormDTO $dto
     * @return Post
     */
    public function store(PostFormDTO $dto): Post
    {
        return Post::create([
            'user_id' => $dto->user_id,
            'body' => $dto->body,
        ]);
    }

    /**
     * @param PostFormDTO $dto
     * @param Post $post
     * @return Post
     */
    public function update(PostFormDTO $dto, Post $post): Post
    {
        return tap($post)->update([
            'user_id' => $dto->user_id,
            'body' => $dto->body,
        ]);
    }

    /**
     * @param Post $post
     * @return void
     */
    public function destroy(Post $post): void
    {
        $post->delete();
    }

    /**
     * @param Post $post
     * @return Collection<int, Comment>
     */
    public function getComments(Post $post): Collection
    {
        return $post->comments;
    }
}
