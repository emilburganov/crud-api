<?php

namespace App\Http\Controllers\Comment\Swagger;

/**
 *
 * @OA\Delete(
 *     path="/api/comments/{id}",
 *     tags={"Comment"},
 *     summary="Delete Comment",
 *     description="Delete Comment",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         description="ID of the Comment",
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
 *             @OA\Property(property="message", type="string", example="Comment not found."),
 *         ),
 *     ),
 * )
 *
 */
class DestroyController
{

}
