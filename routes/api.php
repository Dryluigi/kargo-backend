<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TruckContoller;
use App\Http\Controllers\Api\DriverController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->group(function () {
    Route::prefix('districts')->group(function () {
        Route::get('', [DistrictController::class, 'getAll']);
    });
Route::get('trucks',[TruckContoller::class,'index']);
    Route::post('add-truck',[TruckContoller::class,'store']);
    Route::get('truck/{id}',[TruckContoller::class,'show']);
    Route::put('update-truck/{id}',[TruckContoller::class,'update']);
    Route::get('truck-search/{license_number}',[TruckContoller::class,'search']);
    Route::get('truck-change-status/{id}/{status}',[TruckContoller::class,'changeStatus']);
    Route::get('truck-filter/{truck_type}',[TruckContoller::class,'filter']);
    Route::prefix('shipments')->group(function () {
        Route::post('/create', [ShipmentController::class, 'create']);
        Route::post('/{shipment}/allocate', [ShipmentController::class, 'allocate']);
        Route::post('/{shipment}/status', [ShipmentController::class, 'updateStatus']);
        Route::get('/list', [ShipmentController::class, 'getAll']);
    });
    Route::post('driver', [DriverController::class, 'create']);
    Route::put('driver/update-status/{id}', [DriverController::class, 'updateStatus']);
    Route::post('driver/{id}', [DriverController::class, 'update']);
    Route::get('driver/{id}', [DriverController::class, 'find']);
    Route::get('driver', [DriverController::class, 'getDrivers']);
});
