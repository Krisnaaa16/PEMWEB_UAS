<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Rental",
 *     type="object",
 *     title="Equipment Rental",
 *     description="Rental transaction model",
 *     required={"id", "customer_id", "rental_code", "start_date", "end_date", "total_amount", "status"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Rental ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="customer_id",
 *         type="integer",
 *         description="Customer ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="customer",
 *         ref="#/components/schemas/Customer",
 *         description="Customer information"
 *     ),
 *     @OA\Property(
 *         property="rental_code",
 *         type="string",
 *         description="Unique rental code",
 *         example="RNT-ABC123"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         type="string",
 *         format="date",
 *         description="Rental start date",
 *         example="2025-07-25"
 *     ),
 *     @OA\Property(
 *         property="end_date",
 *         type="string",
 *         format="date",
 *         description="Rental end date",
 *         example="2025-07-30"
 *     ),
 *     @OA\Property(
 *         property="total_amount",
 *         type="number",
 *         format="float",
 *         description="Total rental amount in IDR",
 *         example=750000
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"pending", "confirmed", "active", "completed", "cancelled"},
 *         description="Rental status",
 *         example="confirmed"
 *     ),
 *     @OA\Property(
 *         property="notes",
 *         type="string",
 *         description="Additional notes for the rental",
 *         example="Weekend hiking trip to Mount Bromo"
 *     ),
 *     @OA\Property(
 *         property="rental_items",
 *         type="array",
 *         description="List of rented equipment items",
 *         @OA\Items(ref="#/components/schemas/RentalItem")
 *     ),
 *     @OA\Property(
 *         property="payments",
 *         type="array",
 *         description="Payment records for this rental",
 *         @OA\Items(ref="#/components/schemas/Payment")
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
class Rental {}

/**
 * @OA\Schema(
 *     schema="RentalItem",
 *     type="object",
 *     title="Rental Item",
 *     description="Individual item in a rental",
 *     required={"id", "rental_id", "hiking_equipment_id", "quantity", "price_per_day", "subtotal"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Rental item ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="rental_id",
 *         type="integer",
 *         description="Rental ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="hiking_equipment_id",
 *         type="integer",
 *         description="Equipment ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="hiking_equipment",
 *         ref="#/components/schemas/HikingEquipment",
 *         description="Equipment details"
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="Quantity rented",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="price_per_day",
 *         type="number",
 *         format="float",
 *         description="Price per day at time of rental",
 *         example=25000
 *     ),
 *     @OA\Property(
 *         property="subtotal",
 *         type="number",
 *         format="float",
 *         description="Subtotal for this item",
 *         example=300000
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
class RentalItem {}

/**
 * @OA\Schema(
 *     schema="Customer",
 *     type="object",
 *     title="Customer",
 *     description="Customer model",
 *     required={"id", "name", "email", "phone"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Customer ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Customer full name",
 *         maxLength=255,
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="Customer email address",
 *         example="john.doe@example.com"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Customer phone number",
 *         example="+62812345678"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         description="Customer address",
 *         example="Jl. Sudirman No. 123, Jakarta"
 *     ),
 *     @OA\Property(
 *         property="id_card_number",
 *         type="string",
 *         description="Customer ID card number",
 *         example="3201234567890123"
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
class Customer {}

/**
 * @OA\Schema(
 *     schema="Payment",
 *     type="object",
 *     title="Payment",
 *     description="Payment record model",
 *     required={"id", "rental_id", "amount", "payment_method", "status"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Payment ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="rental_id",
 *         type="integer",
 *         description="Rental ID",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="amount",
 *         type="number",
 *         format="float",
 *         description="Payment amount in IDR",
 *         example=750000
 *     ),
 *     @OA\Property(
 *         property="payment_method",
 *         type="string",
 *         enum={"cash", "bank_transfer", "credit_card", "e_wallet"},
 *         description="Payment method",
 *         example="bank_transfer"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"pending", "completed", "failed", "refunded"},
 *         description="Payment status",
 *         example="completed"
 *     ),
 *     @OA\Property(
 *         property="payment_date",
 *         type="string",
 *         format="date-time",
 *         description="Payment completion date",
 *         example="2025-07-21T14:30:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="reference_number",
 *         type="string",
 *         description="Payment reference number",
 *         example="PAY-ABC123"
 *     ),
 *     @OA\Property(
 *         property="notes",
 *         type="string",
 *         description="Payment notes",
 *         example="Transfer from BCA account"
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
class Payment {}
