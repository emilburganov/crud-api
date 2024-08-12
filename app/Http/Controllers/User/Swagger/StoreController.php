<?php

namespace App\Http\Controllers\User\Swagger;

/**
 *
 * @OA\Post(
 *     path="/api/users",
 *     tags={"User"},
 *     summary="Create New User",
 *     description="Create New User",
 *     security={{"bearer":{}}},
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="name", type="string", example="Emil"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Created",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Emil"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="message", type="string", example="The name field is required."),
 *              @OA\Property(
 *                  property="errors",
 *                  type="object",
 *                  @OA\Property(
 *                      property="name",
 *                      type="array",
 *                      @OA\Items(type="string", example="The name field is required."),
 *                  ),
 *              ),
 *          ),
 *      ),
 * )
 *
 */
class StoreController
{

}
