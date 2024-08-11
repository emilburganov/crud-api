<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DestroyController extends BaseController
{
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(User $user): JsonResponse
    {
        $this->service->destroy($user);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
