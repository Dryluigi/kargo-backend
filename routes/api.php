<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TruckContoller;

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
    Route::prefix('shipments')->group(function () {
        Route::post('', [ShipmentController::class, 'create']);
        Route::get('/list', [ShipmentController::class, 'getAll']);
    });
});