<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetPostsController extends BaseController
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $user = User::find($id);

        if (empty($user)) {
            return response()->json([
                "message" => "User not found."
            ], Response::HTTP_NOT_FOUND);
        }

        $posts = $this->service->getPosts($user);

        return response()->json(PostResource::collection($posts), Response::HTTP_OK);
    }
}
