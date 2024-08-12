<?php

namespace App\DTOs\Post;

use Illuminate\Http\Request;

readonly class PostFormDTO
{
    public int $user_id;
    public string $body;

    /**
     * @param Request $request
     * @return PostFormDTO
     */
    public static function fromRequest(Request $request): PostFormDTO
    {
        return self::createFromArray($request->all());
    }

    /**
     * @param array $data
     * @return PostFormDTO
     */
    public static function createFromArray(array $data): PostFormDTO
    {
        $dto = new self();

        $dto->user_id = $data['user_id'];
        $dto->body = $data['body'];

        return $dto;
    }
}
