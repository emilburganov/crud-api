<?php

namespace App\Http\Controllers\Comment;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DestroyController extends BaseController
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if (empty($comment)) {
            return response()->json([
                "message" => "Comment not found."
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->destroy($comment);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
