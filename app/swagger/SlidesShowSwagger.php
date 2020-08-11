<?php
/**
 * @OA\Get(
 *     tags={"SlideSshow"},
 *     path="/api/slidesshow",
 *     summary="Danh Sách slidesshow ",
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
 *     tags={"SlideSshow"},
 *     path="/api/slidesshow/them-slidesshow",
 *     summary="Thêm slidesshow ",
 *     operationId="create",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="slidesshow_1",
 *                     description="SlideSshow_1",
 *                     type="file",
 *                 ),
 *                  @OA\Property(
 *                     property="slidesshow_2",
 *                     description="SlideSshow_2",
 *                     type="file",
 *                 ),
 *                   @OA\Property(
 *                     property="slidesshow_3",
 *                     description="SlideSshow_3",
 *                     type="file",
 *                 ),
 *              ),
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