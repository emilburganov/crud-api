<?php

namespace App\Http\Controllers\Comment\Swagger;

/**
 *
 * @OA\Post(
 *     path="/api/comments",
 *     tags={"Comment"},
 *     summary="Create New Comment",
 *     description="Create New Comment",
 *     security={{"bearer":{}}},
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="post_id", type="integer", example=2),
 *              @OA\Property(property="user_id", type="integer", example=1),
 *              @OA\Property(property="body", type="string", example="Excellent!"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Created",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="post_id", type="integer", example=2),
 *              @OA\Property(property="user_id", type="integer", example=1),
 *              @OA\Property(property="body", type="string", example="Excellent!"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="message", type="integer", example="The body field is required."),
 *              @OA\Property(
 *                  property="errors",
 *                  type="object",
 *                  @OA\Property(
 *                      property="body",
 *                      type="array",
 *                      @OA\Items(type="string", example="The body field is required."),
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
