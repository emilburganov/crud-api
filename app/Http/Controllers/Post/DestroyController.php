<?php

namespace App\Http\Controllers\Post;

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
        $post = Post::find($id);

        if (empty($post)) {
            return response()->json([
                'message' => 'Post not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->destroy($post);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
