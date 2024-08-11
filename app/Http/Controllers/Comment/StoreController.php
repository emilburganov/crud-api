<?php

namespace App\Http\Controllers\Comment;

use App\DTOs\Comment\CommentFormDTO;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $dto = CommentFormDTO::fromRequest($request);

        $comment = $this->service->store($dto);

        return response()->json(new CommentResource($comment), Response::HTTP_CREATED);
    }
}
