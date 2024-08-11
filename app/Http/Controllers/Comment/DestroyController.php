<?php

namespace App\Http\Controllers\Comment;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DestroyController extends BaseController
{
    /**
     * @param Comment $comment
     * @return JsonResponse
     */
    public function __invoke(Comment $comment): JsonResponse
    {
        $this->service->destroy($comment);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
