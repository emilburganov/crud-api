<?php

namespace App\Services\Comment;

use App\DTOs\Comment\CommentFormDTO;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Comment::all();
    }

    /**
     * @param CommentFormDTO $dto
     * @return Comment
     */
    public function store(CommentFormDTO $dto): Comment
    {
        return Comment::create([
            'post_id' => $dto->post_id,
            'user_id' => $dto->user_id,
            'body' => $dto->body,
        ]);
    }

    /**
     * @param CommentFormDTO $dto
     * @param Comment $comment
     * @return Comment
     */
    public function update(CommentFormDTO $dto, Comment $comment): Comment
    {
        return tap($comment)->update([
            'post_id' => $dto->post_id,
            'user_id' => $dto->user_id,
            'body' => $dto->body,
        ]);
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function destroy(Comment $comment): void
    {
        $comment->delete();
    }
}
