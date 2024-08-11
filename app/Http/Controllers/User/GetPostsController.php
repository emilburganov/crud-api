<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetPostsController extends BaseController
{
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(User $user): JsonResponse
    {
        $posts = $this->service->getPosts($user);

        return response()->json(PostResource::collection($posts), Response::HTTP_OK);
    }
}
