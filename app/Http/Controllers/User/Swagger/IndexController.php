<?php

namespace App\Http\Controllers\User\Swagger;

/**
 *
 * @OA\Get(
 *     path="/api/users",
 *     tags={"User"},
 *     summary="Get User List",
 *     description="Get User List as Array",
 *     security={{"bearer":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Emil"),
 *             ),
 *         ),
 *     ),
 * )
 *
 */
class IndexController
{

}
