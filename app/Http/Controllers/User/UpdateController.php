<?php

namespace App\Http\Controllers\User;

use App\DTOs\User\UserFormDTO;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, User $user): JsonResponse
    {
        $dto = UserFormDTO::fromRequest($request);

        $user = $this->service->update($dto, $user);

        return response()->json(new UserResource($user), Response::HTTP_ACCEPTED);
    }
}
