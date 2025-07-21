<?php

namespace App\OpenApi;

/**
 * @OA\Info(
 *     title="Mountain Gear Rental API",
 *     version="1.0.0",
 *     description="API documentation for Mountain Gear Rental - Hiking Equipment Rental System. This API provides endpoints for managing hiking equipment rentals, customer data, and rental transactions.",
 *     termsOfService="https://pemweb.uas/terms",
 *     @OA\Contact(
 *         name="Mountain Gear Support",
 *         email="info@mountaingear.com"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 *
 * @OA\Server(
 *     url="https://pemweb.uas",
 *     description="Mountain Gear Rental API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="ApiKeyAuth",
 *     type="apiKey",
 *     in="header",
 *     name="X-API-KEY",
 *     description="API Key for authentication. Contact support to get your API key."
 * )
 */
class Info {}
