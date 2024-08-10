<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DestroyController extends BaseController
{
    /**
     * @param Post $post
     * @return JsonResponse
     */
    public function __invoke(Post $post): JsonResponse
    {
        $this->service->destroy($post);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
