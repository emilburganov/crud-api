<?php

namespace App\DTOs\User;

use Illuminate\Http\Request;

readonly class UserFormDTO
{
    public string $name;

    public static function fromRequest(Request $request): UserFormDTO
    {
        return self::createFromArray($request->all());
    }

    public static function createFromArray(array $data): UserFormDTO
    {
        $dto = new self();

        $dto->name = $data['name'];

        return $dto;
    }
}
