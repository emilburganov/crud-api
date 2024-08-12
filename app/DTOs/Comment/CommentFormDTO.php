<?php

namespace App\DTOs\Comment;

use Illuminate\Http\Request;

readonly class CommentFormDTO
{
    public int $post_id;
    public int $user_id;
    public string $body;

    /**
     * @param Request $request
     * @return CommentFormDTO
     */
    public static function fromRequest(Request $request): CommentFormDTO
    {
        return self::createFromArray($request->all());
    }

    /**
     * @param array $data
     * @return CommentFormDTO
     */
    public static function createFromArray(array $data): CommentFormDTO
    {
        $dto = new self();

        $dto->post_id = $data['post_id'];
        $dto->user_id = $data['user_id'];
        $dto->body = $data['body'];

        return $dto;
    }
}
