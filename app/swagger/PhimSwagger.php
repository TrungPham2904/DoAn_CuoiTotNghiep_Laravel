<?php
/**
 * @OA\Get(
 *     tags={"Phim"},
 *     path="/api/phim",
 *     summary="Danh Sách Phim",
 *     operationId="layDanhSach",
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Số lượng phim viên trên trang",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1,
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Số trang",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1
 *         )
 *     ),
 * *     @OA\Parameter(
 *         name="filter",
 *         in="query",
 *         description="Filter film",
 *         @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="the_loai_phim",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="ten_quoc_gia",
 *                  type="string"
 *              ),
 *               @OA\Property(
 *                  property="kieu_phim",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="nam_san_xuat",
 *                  type="string"
 *              ),
 *          ),
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
 * @OA\Get(
 *     tags={"Phim"},
 *     path="/api/phim/ds-phim-le",
 *     summary="Danh sách phim lẻ",
 *     operationId="footerPhimLe",
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Số lượng phim viên trên trang",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1,
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Số trang",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1
 *         )
 * ),
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
 *     summary="Thêm phim ",
 *     operationId="create",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="ten_phim",
 *                     description="Tên phim",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="poster",
 *                     description="Poster",
 *                     type="file",
 *                 ),
 *                 @OA\Property(
 *                     property="loai_phim_id",
 *                     description="Loại phim id",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="quoc_gia_id",
 *                     description="Quốc gia id",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="kieu_phim_id",
 *                     description="Kiểu phim id",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="thoi_luong",
 *                     description="Thời lượng",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="dao_dien",
 *                     description="Đạo diễn",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="link_server",
 *                     description="Link Server",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="link_trailer",
 *                     description="Link Trailer",
 *                     type="string",
 *                 ),
 *                   @OA\Property(
 *                     property="nam_san_xuat",
 *                     description="Năm sản xuất",
 *                     type="string",
 *                 ),
 *                   @OA\Property(
 *                     property="tieu_de",
 *                     description="Tiêu đề",
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
 * @OA\Get(
 *     tags={"Phim"},
 *     path="/api/phim/{id}",
 *     summary="Thông tin chi tiết phim",
 *     operationId="show",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của phim",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1,
 *         )
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
 *     tags={"Phim"},
 *     path="/api/phim/{id}",
 *     summary="Cập nhật thông tin phim",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID của phim",
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
 *                     property="ten_phim",
 *                     description="Tên phim",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="poster",
 *                     description="Poster",
 *                     type="file",
 *                 ),
 *                 @OA\Property(
 *                     property="loai_phim_id",
 *                     description="Loại phim id",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="quoc_gia_id",
 *                     description="Quốc gia id",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="kieu_phim_id",
 *                     description="Kiểu phim id",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="thoi_luong",
 *                     description="Thời lượng",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="link_server",
 *                     description="Link Server",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="link_trailer",
 *                     description="Link Trailer",
 *                     type="string",
 *                 ),
 *                   @OA\Property(
 *                     property="nam_san_xuat",
 *                     description="Năm sản xuất",
 *                     type="string",
 *                 ),
 *                   @OA\Property(
 *                     property="tieu_de",
 *                     description="Tiêu đề",
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
 * @OA\Delete(
 *     tags={"Phim"},
 *     path="/api/phim/xoa-phim/{id}",
 *     summary="Xóa thông tin phim",
 *     operationId="destroy",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của phim",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1,
 *         )
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
 * @OA\Get(
 *     tags={"Phim"},
 *     path="/api/phim/ds-xoa-phim",
 *     summary="Danh sách phim đã xóa",
 *     operationId="danhSachPhimDaXoa",
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
 *     tags={"Phim"},
 *     path="/api/phim/khoi-phuc-phim/{id}",
 *     summary="Cập nhật thông tin phim đã xóa phim",
 *     operationId="khoiPhucPhimDaXoa",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của phim",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1,
 *         )
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

