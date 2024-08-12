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
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, int $id): JsonResponse
    {
        $user = User::find($id);

        if (empty($user)) {
            return response()->json([
                'message' => 'User not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        $dto = UserFormDTO::fromRequest($request);

        $user = $this->service->update($dto, $user);

        return response()->json(new UserResource($user), Response::HTTP_ACCEPTED);
    }
}
