<?php

namespace App\Http\Controllers\User\Swagger;

/**
 *
 * @OA\Put(
 *     path="/api/users/{id}",
 *     tags={"User"},
 *     summary="Update User",
 *     description="Update User",
 *     security={{"bearer":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         description="ID of the User",
 *         required=true,
 *         in="path",
 *         @OA\Schema(type="integer"),
 *         example=1,
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string", example="Emil Burganov"),
 *         ),
 *      ),
 *     @OA\Response(
 *         response=202,
 *         description="Accepted",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="integer", example="Emil Burganov"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="User not found."),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="The name field is required."),
 *             @OA\Property(
 *                 property="errors",
 *                 type="object",
 *                 @OA\Property(
 *                     property="name",
 *                     type="array",
 *                     @OA\Items(type="string", example="The name field is required."),
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
