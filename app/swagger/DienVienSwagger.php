<?php
/**
 * @OA\Get(
 *      tags={"Diễn viên"},
 *      path="/api/dien-vien",
 *      summary="Danh sách diễn viên",
 *      operationId="index",
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Số lượng diễn viên trên trang",
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
 *     tags={"Diễn viên"},
 *     path="/api/dien-vien/them-dienvien",
 *     summary="Thêm diễn viên ",
 *     operationId="create",
*     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="ten_dien_vien",
 *                     description="Tên diễn viên",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="anh_dai_dien",
 *                     description="Ảnh đại diện",
 *                     type="file",
 *                 ),
 *                 @OA\Property(
 *                     property="nam_sinh",
 *                     description="Năm sinh",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="gioi_tinh",
 *                     description="Giới tính",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="chieu_cao",
 *                     description="Chiều cao",
 *                      type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="quoc_tich",
 *                     description="Quốc tịch",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="tieu_su",
 *                     description="Tiểu sử",
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
 *     tags={"Diễn viên"},
 *     path="/api/dien-vien/{id}",
 *     summary="Thông tin chi tiết diễn viên",
 *     operationId="show",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của diễn viên    ",
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
 *     tags={"Diễn viên"},
 *     path="/api/dien-vien/{id}",
 *     summary="Cập nhật thông tin diễn viên",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID của diễn viên",
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
 *                     property="ten_dien_vien",
 *                     description="Tên diên viên",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="anh_dai_dien",
 *                     description="Ảnh đại diện",
 *                     type="file",
 *                 ),
 *                 @OA\Property(
 *                     property="nam_sinh",
 *                     description="Năm sinh",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="gioi_tinh",
 *                     description="Giới tính",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="chieu_cao",
 *                     description="Chiểu cao",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="quoc_tich",
 *                     description="Quốc tịch",
 *                     type="string",
 *                 ),
 *                  @OA\Property(
 *                     property="tieu_su",
 *                     description="Tiểu sử",
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
 *     tags={"Diễn viên"},
 *     path="/api/dien-vien/xoa-dienvien/{id}",
 *     summary="Xóa thông tin diễn viên",
 *     operationId="destroy",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của diễn viên",
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
 *     tags={"Diễn viên"},
 *     path="/api/dien-vien/ds-xoa-dienvien",
 *     summary="Danh sách diễn viên đã xóa",
 *     operationId="danhSachDienVienDaXoa",
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
 *     tags={"Diễn viên"},
 *     path="/api/dien-vien/khoi-phuc-dienvien/{id}",
 *     summary="Cập nhật thông tin diễn viên đã xóa phim",
 *     operationId="khoiPhucDienVienDaXoa",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của diễn viên",
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