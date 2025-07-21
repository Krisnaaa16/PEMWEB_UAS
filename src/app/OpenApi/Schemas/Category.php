<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Category",
 *     type="object",
 *     title="Equipment Category",
 *     description="Category model for hiking equipment",
 *     required={"id", "name"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Category ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Category name",
 *         maxLength=255,
 *         example="Backpacks & Carriers"
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         description="URL-friendly category identifier",
 *         example="backpacks-carriers"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Category description",
 *         example="High-quality backpacks and carriers for all your hiking adventures"
 *     ),
 *     @OA\Property(
 *         property="icon",
 *         type="string",
 *         description="Category icon identifier",
 *         example="heroicon-o-briefcase"
 *     ),
 *     @OA\Property(
 *         property="is_active",
 *         type="boolean",
 *         description="Whether category is active",
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
class Category {}
