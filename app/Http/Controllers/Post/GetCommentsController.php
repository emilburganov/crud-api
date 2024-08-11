<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\CommentResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetCommentsController extends BaseController
{
    /**
     * @param Post $post
     * @return JsonResponse
     */
    public function __invoke(Post $post): JsonResponse
    {
        $comments = $this->service->getComments($post);

        return response()->json(CommentResource::collection($comments), Response::HTTP_OK);
    }
}
