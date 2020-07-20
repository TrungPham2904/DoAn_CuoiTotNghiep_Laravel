<?php
/**
 * @OA\Post(
 *     tags={"NguoiDung"},
 *     path="/api/dang-nhap",
 *     summary="Login",
 *     operationId="dangNhap",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="tai_khoan",
 *                     description="Tài Khoản",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="mat_khau",
 *                     description="Mật Khẩu",
 *                     type="string",
 *                     format="password"
 *                 ),
 *                 required={"email", "password"}
 *             ),
 *         ),
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
<<<<<<< Updated upstream
 
=======
/**
 * @OA\Get(
 *     tags={"Người Dùng"},
 *     path="/api/nguoi-dung",
 *     summary="Danh Sách Phim",
 *     operationId="index",
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
 *      tags={"Người Dùng"},
 *      path="/api/nguoi-dung/them-moi-nguoidung",
 *      summary="Thêm mới người dùng",
 *      operationId="create",
 *      @OA\Parameter(
 *          name="ten",
 *          in="query",
 *          description="Tên người dùng",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="tai_khoan",
 *          in="query",
 *          description="Tài khoản",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *  @OA\Parameter(
 *          name="mat_khau",
 *          in="query",
 *          description="Mật  khẩu",
 *          @OA\Schema(
 *              type="string",
 *              format="password"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="email",
 *          in="query",
 *          description="Email",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="fb_token",
 *          in="query",
 *          description="fb_token",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
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
 *     path="/api/nguoi-dung/tim-kiem",
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
 *     path="/api/nguoi-dung/{id}",
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
 *     path="/api/nguoi-dung/them-phim",
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
>>>>>>> Stashed changes
