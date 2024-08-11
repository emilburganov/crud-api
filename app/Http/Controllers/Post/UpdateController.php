<?php

namespace App\Http\Controllers\Post;

use App\DTOs\Post\PostFormDTO;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
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
        $post = Post::find($id);

        if (empty($post)) {
            return response()->json([
                "message" => "Post not found."
            ], Response::HTTP_NOT_FOUND);
        }

        $dto = PostFormDTO::fromRequest($request);

        $post = $this->service->update($dto, $post);

        return response()->json(new PostResource($post), Response::HTTP_ACCEPTED);
    }
}
