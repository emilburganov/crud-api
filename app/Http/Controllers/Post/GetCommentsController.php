<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\CommentResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetCommentsController extends BaseController
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $post = Post::find($id);

        if (empty($post)) {
            return response()->json(['message' => 'Post not found.'], Response::HTTP_NOT_FOUND);
        }

        $comments = $this->service->getComments($post);

        return response()->json(CommentResource::collection($comments), Response::HTTP_OK);
    }
}
