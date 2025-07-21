<?php

use App\Http\Controllers\Api\HikingEquipmentController;
use App\Http\Controllers\Api\RentalController;

use Illuminate\Support\Facades\Route;

// Mountain Gear Rental API - Hiking Equipment Management
Route::prefix('hiking-equipment')->middleware('apikey')->group(function () {
    Route::get('/', [HikingEquipmentController::class, 'index']);       // GET /api/hiking-equipment
    Route::get('{id}', [HikingEquipmentController::class, 'show']);     // GET /api/hiking-equipment/{id}
    Route::post('/', [HikingEquipmentController::class, 'store']);      // POST /api/hiking-equipment
    Route::put('{id}', [HikingEquipmentController::class, 'update']);   // PUT /api/hiking-equipment/{id}
    Route::delete('{id}', [HikingEquipmentController::class, 'destroy']); // DELETE /api/hiking-equipment/{id}
});

// Mountain Gear Rental API - Rental Management
Route::prefix('rentals')->middleware('apikey')->group(function () {
    Route::get('/', [RentalController::class, 'index']);           // GET /api/rentals
    Route::get('{id}', [RentalController::class, 'show']);         // GET /api/rentals/{id}
    Route::post('/', [RentalController::class, 'store']);          // POST /api/rentals
    Route::put('{id}/status', [RentalController::class, 'updateStatus']); // PUT /api/rentals/{id}/status
});
