<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="HikingEquipment",
 *     type="object",
 *     title="Hiking Equipment",
 *     description="Hiking equipment model for rental system",
 *     required={"id", "name", "category_id", "price_per_day", "stock_quantity"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Equipment ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Equipment name",
 *         maxLength=255,
 *         example="Mountain Backpack Pro 60L"
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         description="URL-friendly equipment identifier",
 *         example="mountain-backpack-pro-60l"
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         type="integer",
 *         description="Category ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="category",
 *         ref="#/components/schemas/Category",
 *         description="Equipment category"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Equipment description",
 *         example="Professional hiking backpack with 60L capacity, perfect for multi-day trekking adventures"
 *     ),
 *     @OA\Property(
 *         property="price_per_day",
 *         type="number",
 *         format="float",
 *         description="Rental price per day in IDR",
 *         example=25000
 *     ),
 *     @OA\Property(
 *         property="stock_quantity",
 *         type="integer",
 *         description="Available stock quantity",
 *         example=10
 *     ),
 *     @OA\Property(
 *         property="available_quantity",
 *         type="integer",
 *         description="Currently available quantity (not rented)",
 *         example=8
 *     ),
 *     @OA\Property(
 *         property="brand",
 *         type="string",
 *         description="Equipment brand",
 *         maxLength=100,
 *         example="MountainPro"
 *     ),
 *     @OA\Property(
 *         property="specifications",
 *         type="object",
 *         description="Equipment specifications in JSON format",
 *         example={"capacity": "60L", "weight": "2.5kg", "material": "Ripstop Nylon"}
 *     ),
 *     @OA\Property(
 *         property="image_url",
 *         type="string",
 *         description="Equipment image URL",
 *         example="https://images.unsplash.com/photo-1551698618-1dfe5d97d256"
 *     ),
 *     @OA\Property(
 *         property="is_featured",
 *         type="boolean",
 *         description="Whether equipment is featured",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="is_active",
 *         type="boolean",
 *         description="Whether equipment is active for rental",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp",
 *         example="2025-07-21T10:00:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp",
 *         example="2025-07-21T10:00:00.000000Z"
 *     )
 * )
 */
class HikingEquipment {}
