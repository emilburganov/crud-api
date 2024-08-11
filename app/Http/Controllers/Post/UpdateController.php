<?php

namespace App\Http\Controllers\Post;

use App\DTOs\Post\UserFormDTO;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, Post $post): JsonResponse
    {
        $dto = UserFormDTO::fromRequest($request);

        $post = $this->service->update($dto, $post);

        return response()->json(new PostResource($post), Response::HTTP_ACCEPTED);
    }
}
