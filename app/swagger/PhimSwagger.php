<?php
/**
 * @OA\Get(
 *     tags={"Phim"},
 *     path="/api/phim",
 *     summary="Danh Sách Phim",
 *     operationId="layDanhSach",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="loai_phim_id",
 *                     description="Thể loại",
 *                     type="string",
 *                 ),
 *              @OA\Property(
 *                     property="quoc_gia_id",
 *                     description="Ngôn Ngữ",
 *                     type="string",
 *                 ),
 *               @OA\Property(
 *                     property="kieu_phim_id",
 *                     description="Kiểu phim",
 *                     type="string",
 *                 ),
  *               @OA\Property(
 *                     property="nam_san_xuat",
 *                     description="Năm sản xuất",
 *                     type="string",
 *                 ),
 *          ),
 *         ),
 *        ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
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
