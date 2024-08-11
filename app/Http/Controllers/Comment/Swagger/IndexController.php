<?php

namespace App\Http\Controllers\Comment\Swagger;

/**
 *
 * @OA\Get(
 *     path="/api/comments",
 *     tags={"Comment"},
 *     summary="Get Comment List",
 *     description="Get Comment List as Array",
 *     security={{"bearer":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="post_id", type="integer", example=2),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="body", type="string", example="Excellent!"),
 *             ),
 *         ),
 *     ),
 * )
 *
 */
class IndexController
{

}
