<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Api\DriverController;

Route::post('api/driver', [DriverController::class, 'create']);
Route::put('api/driver/update-status/{id}', [DriverController::class, 'updateStatus']);
Route::post('api/driver/{id}', [DriverController::class, 'update']);
Route::get('api/driver/{id}', [DriverController::class, 'find']);
Route::get('api/driver', [DriverController::class, 'getDrivers']);
