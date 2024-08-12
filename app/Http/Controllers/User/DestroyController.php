<?php

namespace App\Http\Controllers\User;

use App\Models\User;
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
        $user = User::find($id);

        if (empty($user)) {
            return response()->json(['message' => 'User not found.'], Response::HTTP_NOT_FOUND);
        }

        $this->service->destroy($user);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
