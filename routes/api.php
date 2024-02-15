<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingsController;
use App\Http\Controllers\Api\VehicleController;
use App\Models\Bookings;

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
Route::post('/user-types', [AuthController::class, 'userTypes'])->name('userTypes');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login-otp', [AuthController::class, 'loginOtp'])->name('loginOtp');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/vehicle-reg', [VehicleController::class, 'vehicleReg'])->name('vehicleReg');
    Route::post('/driver-photo', [VehicleController::class, 'uploadFiles'])->name('uploadPhoto');
    Route::post('/driver/complete-details', [VehicleController::class, 'uploadFiles'])->name('uploadFiles');
    Route::post('/bookings', [BookingsController ::class, 'bookings'])->name('bookings');


});
