<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VehicleController;

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

Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verify-otp', [AuthController::class, 'otpVerify'])->name('verifyOtp');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login-otp', [AuthController::class, 'loginOtp'])->name('loginOtp');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/vehicle-reg', [VehicleController::class, 'vehicleReg'])->name('vehicleReg');

});
