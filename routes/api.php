<?php

use App\Events\DeviceStatusUpdate;
use App\Http\Controllers\DeviceApiController;
use App\Http\Controllers\DeviceController;
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

Route::post('/device/install', [DeviceApiController::class, 'store']);
Route::post('/device/status/{id}', [DeviceApiController::class, 'setStatus']);
Route::post('/device/battery/{id}', [DeviceApiController::class, 'setBattery']);
Route::post('/device/quota/{id}', [DeviceApiController::class, 'setQuota']);

Route::post('/device/tes', function(){
    DeviceStatusUpdate::dispatch('heloo1');
    return view('welcome');
});

