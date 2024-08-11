<?php

namespace App\DTOs\User;

use Illuminate\Http\Request;

readonly class UserFormDTO
{
    public int $user_id;
    public string $body;

    public static function fromRequest(Request $request): UserFormDTO
    {
        return self::createFromArray($request->all());
    }

    public static function createFromArray(array $data): UserFormDTO
    {
        $dto = new self();

        $dto->user_id = $data['user_id'];
        $dto->body = $data['body'];

        return $dto;
    }
}
