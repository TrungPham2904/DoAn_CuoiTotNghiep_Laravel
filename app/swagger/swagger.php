<?php

/**
 *  @OA\Info(
 *     description="SONIC API",
 *     version="3.x",
 *     title="SONIC API"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     in="header",
 *     name="Authorization",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 * @OA\PathItem(
 *   path="/"
 * )
 */