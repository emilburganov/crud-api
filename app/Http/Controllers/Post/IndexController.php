<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $posts = $this->service->index();

        return response()->json(PostResource::collection($posts), Response::HTTP_OK);
    }
}
