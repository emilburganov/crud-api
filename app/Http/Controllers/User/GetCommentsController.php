<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\CommentResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetCommentsController extends BaseController
{
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(User $user): JsonResponse
    {
        $comments = $this->service->getComments($user);

        return response()->json(CommentResource::collection($comments), Response::HTTP_OK);
    }
}
