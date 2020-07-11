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
 *                    
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
 *                 @OA\Property(
 *                     property="quoc_gia_id",
 *                     description="Quốc gia",
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
/**
 * @OA\Get(
 *     tags={"Tìm kiếm"},
 *     path="/api/tim-kiem",
 *     summary="Tìm kiếm theo nhu cầu",
 *     operationId="TiemKiem",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="key_word",
 *                     description="Tìm kiếm",
 *                     type="string",
 *                 ),
 *              ),
 *          ),
 *      ),
 *  @OA\Response(
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

/**
 * @OA\Get(
 *     tags={"Chi Tiết Trang"},
 *     path="/api/phim/{id}",
 *     summary="Thông tin chi tiết trang",
 *     operationId="ChiTietTrang",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID phim",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1
 *         )
 *     ),
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
  /**
 * @OA\Post(
 *     tags={"Phim"},
 *     path="/api/phim/them-phim",
 *     summary="Cập nhật phim",
 *     operationId="TaoPhim",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="fileFilm",
 *                     description="Thêm file",
 *                     type="file",
 *                 ),
 *              ),
 *          ),
 *      ),
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