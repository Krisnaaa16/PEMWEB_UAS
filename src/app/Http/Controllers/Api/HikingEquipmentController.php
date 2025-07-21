<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HikingEquipment;
use App\Models\Category;
use Illuminate\Http\Request;

class HikingEquipmentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/hiking-equipment",
     *     operationId="getHikingEquipments",
     *     tags={"Hiking Equipment"},
     *     summary="Get all hiking equipment",
     *     description="Returns a list of all available hiking equipment for rental",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="category",
     *         in="query",
     *         required=false,
     *         description="Filter by category ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Parameter(
     *         name="available",
     *         in="query",
     *         required=false,
     *         description="Filter by availability",
     *         @OA\Schema(type="boolean", example=true)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Equipment retrieved successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/HikingEquipment")
     *             ),
     *             @OA\Property(property="total", type="integer", example=25)
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function index(Request $request)
    {
        $query = HikingEquipment::with(['category'])
            ->where('is_active', true);

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by availability if provided
        if ($request->has('available')) {
            if ($request->boolean('available')) {
                $query->available();
            }
        }

        $equipment = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Equipment retrieved successfully',
            'data' => $equipment,
            'total' => $equipment->count()
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/hiking-equipment",
     *     operationId="storeHikingEquipment",
     *     tags={"Hiking Equipment"},
     *     summary="Create new hiking equipment",
     *     description="Add new hiking equipment to the rental inventory",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "category_id", "price_per_day", "stock_quantity"},
     *             @OA\Property(property="name", type="string", example="Mountain Backpack Pro 60L"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="description", type="string", example="Professional hiking backpack with 60L capacity"),
     *             @OA\Property(property="price_per_day", type="number", format="float", example=25.50),
     *             @OA\Property(property="stock_quantity", type="integer", example=10),
     *             @OA\Property(property="brand", type="string", example="MountainPro"),
     *             @OA\Property(property="specifications", type="object", example={"capacity": "60L", "weight": "2.5kg"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Equipment created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Equipment created successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/HikingEquipment")
     *         )
     *     ),
     *     @OA\Response(response=422, description="Validation error"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price_per_day' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:100',
            'specifications' => 'nullable|json'
        ]);

        $equipment = HikingEquipment::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Equipment created successfully',
            'data' => $equipment->load('category')
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/hiking-equipment/{id}",
     *     operationId="getHikingEquipmentById",
     *     tags={"Hiking Equipment"},
     *     summary="Get hiking equipment by ID",
     *     description="Returns details of specific hiking equipment",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Equipment ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Equipment retrieved successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/HikingEquipment")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Equipment not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function show($id)
    {
        $equipment = HikingEquipment::with(['category'])->find($id);

        if (!$equipment) {
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Equipment retrieved successfully',
            'data' => $equipment
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/hiking-equipment/{id}",
     *     operationId="updateHikingEquipment",
     *     tags={"Hiking Equipment"},
     *     summary="Update hiking equipment",
     *     description="Update existing hiking equipment details",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Equipment ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Mountain Backpack Pro 60L Updated"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="description", type="string", example="Updated description"),
     *             @OA\Property(property="price_per_day", type="number", format="float", example=30.00),
     *             @OA\Property(property="stock_quantity", type="integer", example=15)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Equipment updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Equipment updated successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/HikingEquipment")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Equipment not found"),
     *     @OA\Response(response=422, description="Validation error"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function update(Request $request, $id)
    {
        $equipment = HikingEquipment::find($id);

        if (!$equipment) {
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'description' => 'nullable|string',
            'price_per_day' => 'sometimes|numeric|min:0',
            'stock_quantity' => 'sometimes|integer|min:0',
            'brand' => 'nullable|string|max:100',
            'specifications' => 'nullable|json'
        ]);

        $equipment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Equipment updated successfully',
            'data' => $equipment->load('category')
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/hiking-equipment/{id}",
     *     operationId="deleteHikingEquipment",
     *     tags={"Hiking Equipment"},
     *     summary="Delete hiking equipment",
     *     description="Remove hiking equipment from inventory",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Equipment ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Equipment deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Equipment deleted successfully")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Equipment not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function destroy($id)
    {
        $equipment = HikingEquipment::find($id);

        if (!$equipment) {
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found'
            ], 404);
        }

        $equipment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Equipment deleted successfully'
        ]);
    }
}
