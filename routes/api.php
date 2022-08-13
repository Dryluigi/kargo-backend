<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('shipments')->group(function () {
        Route::post('', [ShipmentController::class, 'create']);
        Route::get('/list', [ShipmentController::class, 'getAll']);
    });
});
