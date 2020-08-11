<?php
/**
 * @OA\Post(
 *     tags={"Chi tiết diễn viên"},
 *     path="/api/chi-tiet-dien-vien/them-chi-tiet",
 *     summary="Thêm chi tiết diễn viên",
 *     operationId="create",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="phim_id",
 *                     description="Phim id",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="dien_vien_id",
 *                     description="Diễn viên id",
 *                     type="string",
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error server",
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )
 */
/**
 * @OA\Post(
 *     tags={"Chi tiết diễn viên"},
 *     path="/api/chi-tiet-dien-vien/{id}",
 *     summary="Cập nhật chi tiết diễn viên",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID của chi tiết diễn viên",
 *          @OA\Schema(
 *              type="integer",
 *              format="int64",
 *              minimum=1,
 *          )
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="phim_id",
 *                     description="Phim id",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="dien_vien_id",
 *                     description="Diễn viên id",
 *                     type="string",
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error server",
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )
 */