<?php

namespace App\Http\Controllers\User;

use App\DTOs\User\UserFormDTO;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $dto = UserFormDTO::fromRequest($request);

        $user = $this->service->store($dto);

        return response()->json(new UserResource($user), Response::HTTP_CREATED);
    }
}
