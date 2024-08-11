<?php

namespace App\Http\Controllers\Comment;

use App\Http\Resources\CommentResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $comments = $this->service->index();

        return response()->json(CommentResource::collection($comments), Response::HTTP_OK);
    }
}
