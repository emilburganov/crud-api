<?php

namespace App\Http\Controllers\User\Swagger;

/**
 *
 * @OA\Get(
 *     path="/api/users/{id}/comments",
 *     tags={"User"},
 *     summary="Get User's Comments",
 *     description="Get User's Comments",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         description="ID of the User",
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
 *                  @OA\Property(property="body", type="string", example="Excellent!"),
 *              ),
 *          ),
 *      ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="User not found."),
 *         ),
 *     ),
 * )
 *
 */
class GetCommentsController
{

}
