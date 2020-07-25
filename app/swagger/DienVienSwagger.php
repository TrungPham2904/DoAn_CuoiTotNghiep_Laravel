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
 *      @OA\Parameter(
 *          name="ten_dien_vien",
 *          in="query",
 *          description="Tên diễn viên",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="nam_sinh",
 *          in="query",
 *          description="Năm sinh",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="gioi_tinh",
 *          in="query",
 *          description="Giới tính",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="chieu_cao",
 *          in="query",
 *          description="Chiều cao",
 *          @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             minimum=1
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="quoc_tich",
 *          in="query",
 *          description="Quốc tịch",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *       @OA\Parameter(
 *          name="tieu_su",
 *          in="query",
 *          description="Tiểu sử",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *        @OA\Parameter(
 *          name="anh_dai_dien",
 *          in="query",
 *          description="Ảnh đại diện",
 *          @OA\Schema(
 *              type="string"
 *          )
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