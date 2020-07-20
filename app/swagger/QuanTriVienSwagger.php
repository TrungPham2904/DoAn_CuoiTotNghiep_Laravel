<?php
/**
 * @OA\Get(
 *      tags={"Quản Trị Viên"},
 *      path="/api/quan-tri-vien",
 *      summary="Lấy danh sách quản trị viên",
 *      operationId="index",
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
 *     tags={"Quản Trị Viên"},
 *     path="/api/quan-tri-vien/login",
 *     summary="Login",
 *     operationId="dangNhap",
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
 *      tags={"Quản Trị Viên"},
 *      path="/api/quan-tri-vien/logout",
 *      summary="Logout",
 *      operationId="dangXuat",
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Error server",
 *      ),
 *      security={
 *          {"bearerAuth": {}}
 *      }
 * )
 */
/**
 * @OA\Post(
 *      tags={"Quản Trị Viên"},
 *      path="/api/quan-tri-vien/them-moi-quantrivien",
 *      summary="Thêm quản trị viên",
 *      operationId="create",
 *      @OA\Parameter(
 *          name="ten",
 *          in="query",
 *          description="Tên quản trị viên",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="tai_khoan",
 *          in="query",
 *          description="Tai_khoản",
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
 *          name="loai",
 *          in="query",
 *          description="Loại",
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
 *     tags={"Quản Trị Viên"},
 *     path="/api/quan-tri-vien/{id}",
 *     summary="Chi tiết thông tin quản trị viên",
 *     operationId="show",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID của quản trị viên",
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
 *     tags={"Quản Trị Viên"},
 *     path="/api/quan-tri-vien/{id}",
 *     summary="Cập nhật thông tin quản trị viên",
 *     operationId="update",
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID của quản trị viên",
 *          @OA\Schema(
 *              type="integer",
 *              format="int64",
 *              minimum=1,
 *          )
 *     ),
 *     @OA\RequestBody(
 *          @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="ten",
 *                     description=" Tên quản trị viên",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="tai_khoan",
 *                     description="Tài khoản quản trị viên",
 *                     type="string",
 *                 ),
 *             )
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