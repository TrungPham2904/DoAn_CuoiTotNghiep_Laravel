<?php
/**
 * @OA\Post(
 *     tags={"Người Dùng"},
 *     path="/api/nguoi-dung/login",
 *     summary="Login người dùng",
 *     operationId="dangNhapNguoiDung",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="email",
 *                     description="Email",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="mat_khau",
 *                     description="Mật Khẩu",
 *                     type="string",
 *                     format="password"
 *                 ),
 *                 @OA\Property(
 *                     property="fcm_token",
 *                     description="Token device",
 *                     type="string",
 *                 ),
 *                 required={"email", "mat_khau"}
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
 * @OA\Get(
 *     tags={"Người Dùng"},
 *     path="/api/nguoi-dung/tiem-kiem",
 *     summary="Tiềm kiếm tất cả",
 *     operationId="TiemKiem",
 *     @OA\Parameter(
 *         name="key_word",
 *         in="query",
 *         description="Find admin by keyword (ten_phim | dien_vien)",
 *         @OA\Schema(
 *             type="string"
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
 *     tags={"Người Dùng"},
 *     path="/api/admin",
 *     summary="Danh sách người dùng",
 *     operationId="index",
 *      @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Số lượng người trên trang",
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
 *     @OA\Parameter(
 *         name="filter",
 *         in="query",
 *         description="Filter customer (ten | tai_khoan | email |fb_token)",
 *         @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="ten",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="email",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="tai_khoan",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="fb_token",
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
 *     tags={"Người Dùng"},
 *     path="/api/nguoi-dung/test",
 *     summary="Test",
 *     operationId="soLuongNguoiTruyCap",
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

