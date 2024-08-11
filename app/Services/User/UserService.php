<?php

namespace App\Services\User;

use App\DTOs\User\UserFormDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return User::all();
    }

    /**
     * @param UserFormDTO $dto
     * @return User
     */
    public function store(UserFormDTO $dto): User
    {
        return User::create([
            'name' => $dto->name,
        ]);
    }

    /**
     * @param UserFormDTO $dto
     * @param User $user
     * @return User
     */
    public function update(UserFormDTO $dto, User $user): User
    {
        return tap($user)->update([
            'name' => $dto->name,
        ]);
    }

    /**
     * @param User $user
     * @return void
     */
    public function destroy(User $user): void
    {
        $user->delete();
    }
}
