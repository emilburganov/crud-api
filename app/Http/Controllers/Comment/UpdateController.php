<?php

namespace App\Http\Controllers\Comment;

use App\DTOs\Comment\CommentFormDTO;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, Comment $comment): JsonResponse
    {
        $dto = CommentFormDTO::fromRequest($request);

        $comment = $this->service->update($dto, $comment);

        return response()->json(new CommentResource($comment), Response::HTTP_ACCEPTED);
    }
}
