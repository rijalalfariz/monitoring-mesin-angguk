<?php

use App\Events\DeviceStatusUpdate;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;

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

Route::get('/', function () {
    return redirect('dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/monitoring', [DashboardController::class, 'monitoring'])->middleware('auth')->name('monitoring');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
// Route::get('/edit-profile', [UserController::class, 'edit'])->middleware('auth');
Route::post('/edit-profile', [UserController::class, 'update'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/device/edit/{id}', [DeviceController::class, 'update']);
Route::post('/device/delete/{id}', [DeviceController::class, 'destroy']);
Route::post('/device/install', [DeviceController::class, 'store']);
Route::post('/device/status', [DeviceController::class, 'setStatus']);
Route::post('/device/batery', [DeviceController::class, 'setBatery']);
Route::post('/device/kuota', [DeviceController::class, 'setKuota']);
Route::get('/device/tes', function(){
    DeviceStatusUpdate::dispatch('--');
    return view('welcome');
});
Route::post('/device/tes', function(Request $request){
    DeviceStatusUpdate::dispatch($request);
    return view('welcome');
});
