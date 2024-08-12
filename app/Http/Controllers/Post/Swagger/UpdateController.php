<?php

namespace App\Http\Controllers\Post\Swagger;

/**
 *
 * @OA\Put(
 *     path="/api/posts/{id}",
 *     tags={"Post"},
 *     summary="Update Post",
 *     description="Update Post",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         description="ID of the Post",
 *         required=true,
 *         in="path",
 *         @OA\Schema(type="integer"),
 *         example=1,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="user_id", type="integer", example=2),
 *             @OA\Property(property="body", type="string", example="Hello, World!"),
 *         ),
 *      ),
 *     @OA\Response(
 *         response=202,
 *         description="Accepted",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="user_id", type="integer", example=1),
 *             @OA\Property(property="body", type="string", example="Hello, World!"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Post not found."),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="The body field is required."),
 *             @OA\Property(
 *                 property="errors",
 *                 type="object",
 *                 @OA\Property(
 *                     property="body",
 *                     type="array",
 *                     @OA\Items(type="string", example="The body field is required."),
 *                 ),
 *             ),
 *         ),
 *     ),
 * )
 *
 */
class UpdateController
{

}
