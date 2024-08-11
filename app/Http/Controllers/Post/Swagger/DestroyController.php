<?php

namespace App\Http\Controllers\Post\Swagger;

/**
 *
 * @OA\Delete(
 *     path="/api/posts/{id}",
 *     tags={"Post"},
 *     summary="Delete Post",
 *     description="Delete Post",
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
 *         response=204,
 *         description="No Content",
 *     ),
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
class DestroyController
{

}
