<?php

namespace App\Http\Controllers\Post\Swagger;

/**
 *
 * @OA\Get(
 *     path="/api/posts",
 *     tags={"Post"},
 *     summary="Get Post List",
 *     description="Get Post List as Array",
 *     security={{"bearer":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="body", type="string", example="Hello, World!"),
 *             ),
 *         ),
 *     ),
 * )
 *
 */
class IndexController
{

}
