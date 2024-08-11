<?php

namespace App\Http\Controllers\Post;

use App\DTOs\Post\UserFormDTO;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
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

        $post = $this->service->store($dto);

        return response()->json(new PostResource($post), Response::HTTP_CREATED);
    }
}
