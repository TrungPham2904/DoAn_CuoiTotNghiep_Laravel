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
