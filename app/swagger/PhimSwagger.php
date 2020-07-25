<?php
/**
 * @OA\Get(
 *     tags={"Phim"},
 *     path="/api/phim",
 *     summary="Danh Sách Phim",
 *     operationId="layDanhSach",
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
 *      @OA\Parameter(
 *          name="ten_phim",
 *          in="query",
 *          description="Tên phim",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="poster",
 *          in="query",
 *          description="Poster",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="loai_phim_id",
 *          in="query",
 *          description="Loại phim id",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="quoc_gia_id",
 *          in="query",
 *          description="Quốc gia id",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="kieu_phim_id",
 *          in="query",
 *          description="Kiểu phim id",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *       @OA\Parameter(
 *          name="thoi_luong",
 *          in="query",
 *          description="Thời lượng",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *        @OA\Parameter(
 *          name="dien_vien_id",
 *          in="query",
 *          description="Diễn viên id",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *         @OA\Parameter(
 *          name="link_server",
 *          in="query",
 *          description="Link Server",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *          @OA\Parameter(
 *          name="link_trailer",
 *          in="query",
 *          description="Link Trailer",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *          @OA\Parameter(
 *          name="nam_san_xuat",
 *          in="query",
 *          description="Năm sản xuất",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *          @OA\Parameter(
 *          name="tieu_de",
 *          in="query",
 *          description="Tiêu đề",
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