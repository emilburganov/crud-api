<?php

namespace App\Http\Controllers\Post\Swagger;

/**
 *
 * @OA\Get(
 *     path="/api/posts/{id}/comments",
 *     tags={"Post"},
 *     summary="Get Post's Comments",
 *     description="Get Post's Comments",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         description="ID of the Post",
 *         required=true,
 *         in="path",
 *         @OA\Schema(type="integer"),
 *         example=1,
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="post_id", type="integer", example=2),
 *                  @OA\Property(property="user_id", type="integer", example=1),
 *                  @OA\Property(property="body", type="string", example="Hello, World!"),
 *              ),
 *          ),
 *      ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Post not found."),
 *         ),
 *     ),
 * )
 *
 */
class GetCommentsController
{

}
