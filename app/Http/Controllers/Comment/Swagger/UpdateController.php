<?php

namespace App\Http\Controllers\Comment\Swagger;

/**
 *
 * @OA\Put(
 *     path="/api/comments/{id}",
 *     tags={"Comment"},
 *     summary="Update Comment",
 *     description="Update Commment",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         description="ID of the Comment",
 *         required=true,
 *         in="path",
 *         @OA\Schema(type="integer"),
 *         example=1,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="post_id", type="integer", example=1),
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
 *             @OA\Property(property="post_id", type="integer", example=1),
 *             @OA\Property(property="user_id", type="integer", example=2),
 *             @OA\Property(property="body", type="string", example="Hello, World!"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Comment not found."),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="integer", example="The body field is required."),
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
