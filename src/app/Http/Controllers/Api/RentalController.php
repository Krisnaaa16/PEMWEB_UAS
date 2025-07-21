<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\HikingEquipment;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/rentals",
     *     operationId="getRentals",
     *     tags={"Rentals"},
     *     summary="Get all rentals",
     *     description="Returns a list of all rental transactions",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         required=false,
     *         description="Filter by rental status",
     *         @OA\Schema(type="string", enum={"pending", "confirmed", "active", "completed", "cancelled"})
     *     ),
     *     @OA\Parameter(
     *         name="customer_id",
     *         in="query",
     *         required=false,
     *         description="Filter by customer ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Rentals retrieved successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Rental")
     *             ),
     *             @OA\Property(property="total", type="integer", example=50)
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function index(Request $request)
    {
        $query = Rental::with(['customer', 'rentalItems.hikingEquipment']);

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by customer if provided
        if ($request->has('customer_id')) {
            $query->where('customer_id', $request->customer_id);
        }

        $rentals = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Rentals retrieved successfully',
            'data' => $rentals,
            'total' => $rentals->count()
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/rentals",
     *     operationId="createRental",
     *     tags={"Rentals"},
     *     summary="Create new rental",
     *     description="Create a new equipment rental booking",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"customer_id", "start_date", "end_date", "equipment_items"},
     *             @OA\Property(property="customer_id", type="integer", example=1),
     *             @OA\Property(property="start_date", type="string", format="date", example="2025-07-25"),
     *             @OA\Property(property="end_date", type="string", format="date", example="2025-07-30"),
     *             @OA\Property(property="notes", type="string", example="Weekend hiking trip to Mount Bromo"),
     *             @OA\Property(
     *                 property="equipment_items",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="hiking_equipment_id", type="integer", example=1),
     *                     @OA\Property(property="quantity", type="integer", example=2)
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Rental created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Rental created successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Rental")
     *         )
     *     ),
     *     @OA\Response(response=422, description="Validation error"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'notes' => 'nullable|string',
            'equipment_items' => 'required|array|min:1',
            'equipment_items.*.hiking_equipment_id' => 'required|exists:hiking_equipments,id',
            'equipment_items.*.quantity' => 'required|integer|min:1'
        ]);

        // Calculate total amount
        $totalAmount = 0;
        $rentalDays = now()->parse($validated['start_date'])->diffInDays($validated['end_date']) + 1;

        foreach ($validated['equipment_items'] as $item) {
            $equipment = HikingEquipment::find($item['hiking_equipment_id']);
            $totalAmount += $equipment->price_per_day * $item['quantity'] * $rentalDays;
        }

        // Create rental
        $rental = Rental::create([
            'customer_id' => $validated['customer_id'],
            'rental_code' => 'RNT-' . strtoupper(uniqid()),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null
        ]);

        // Create rental items
        foreach ($validated['equipment_items'] as $item) {
            $equipment = HikingEquipment::find($item['hiking_equipment_id']);
            $rental->rentalItems()->create([
                'hiking_equipment_id' => $item['hiking_equipment_id'],
                'quantity' => $item['quantity'],
                'price_per_day' => $equipment->price_per_day,
                'subtotal' => $equipment->price_per_day * $item['quantity'] * $rentalDays
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Rental created successfully',
            'data' => $rental->load(['customer', 'rentalItems.hikingEquipment'])
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/rentals/{id}",
     *     operationId="getRentalById",
     *     tags={"Rentals"},
     *     summary="Get rental by ID",
     *     description="Returns details of specific rental",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Rental ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Rental retrieved successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Rental")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Rental not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function show($id)
    {
        $rental = Rental::with(['customer', 'rentalItems.hikingEquipment', 'payments'])->find($id);

        if (!$rental) {
            return response()->json([
                'success' => false,
                'message' => 'Rental not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Rental retrieved successfully',
            'data' => $rental
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/rentals/{id}/status",
     *     operationId="updateRentalStatus",
     *     tags={"Rentals"},
     *     summary="Update rental status",
     *     description="Update the status of a rental (confirm, start, complete, cancel)",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Rental ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"status"},
     *             @OA\Property(property="status", type="string", enum={"confirmed", "active", "completed", "cancelled"}, example="confirmed"),
     *             @OA\Property(property="notes", type="string", example="Payment confirmed, equipment ready for pickup")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Status updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Rental status updated successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Rental")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Rental not found"),
     *     @OA\Response(response=422, description="Invalid status transition"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function updateStatus(Request $request, $id)
    {
        $rental = Rental::find($id);

        if (!$rental) {
            return response()->json([
                'success' => false,
                'message' => 'Rental not found'
            ], 404);
        }

        $validated = $request->validate([
            'status' => 'required|in:confirmed,active,completed,cancelled',
            'notes' => 'nullable|string'
        ]);

        $rental->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ? $rental->notes . "\n" . $validated['notes'] : $rental->notes
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rental status updated successfully',
            'data' => $rental->load(['customer', 'rentalItems.hikingEquipment'])
        ]);
    }
}
