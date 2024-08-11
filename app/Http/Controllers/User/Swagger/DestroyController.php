<?php

namespace App\Http\Controllers\User\Swagger;

/**
 *
 * @OA\Delete(
 *     path="/api/users/{id}",
 *     tags={"User"},
 *     summary="Delete User",
 *     description="Delete User",
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
 *         response=204,
 *         description="No Content",
 *     ),
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
class DestroyController
{

}
