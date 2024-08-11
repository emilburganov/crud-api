<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $users = $this->service->index();

        return response()->json(UserResource::collection($users), Response::HTTP_OK);
    }
}
