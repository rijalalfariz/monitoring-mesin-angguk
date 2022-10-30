<?php

use App\Events\DeviceStatusUpdate;
use App\Http\Controllers\Controller;
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
Route::post('/device/tipe-device/{id}', [DeviceApiController::class, 'setTipeDevice']);
Route::post('/device/ampere/{id}', [DeviceApiController::class, 'setAmpere']);
Route::post('/device/tegangan/{id}', [DeviceApiController::class, 'setTegangan']);
Route::post('/device/update/{id}', [DeviceApiController::class, 'updateAllDeviceParameter']);

Route::post('/device/tes', function(){
    DeviceStatusUpdate::dispatch('heloo1');
    return view('welcome');
});

Route::get('tes', [Controller::class, 'dump_function_test']);

//temporary
Route::post('/device/tesbattery/{id}', [DeviceApiController::class, 'setRandomBattery']);
Route::post('/device/tesampere/{id}', [DeviceApiController::class, 'setRandomAmpere']);

