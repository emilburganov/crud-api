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
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if (empty($comment)) {
            return response()->json([
                'message' => 'Comment not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        $dto = CommentFormDTO::fromRequest($request);

        $comment = $this->service->update($dto, $comment);

        return response()->json(new CommentResource($comment), Response::HTTP_ACCEPTED);
    }
}
