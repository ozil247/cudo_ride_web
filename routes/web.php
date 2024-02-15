<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {return view('welcome');});
Route::get('/welcome', [WelcomeController::class,'wecome'])->name('welcome');
Route::get('/about-us', [AboutUsController::class, 'aboutUs'])->name('about.us');
Route::post('/register_otp', [RegisterController::class, 'sendOtp'])->name('register_otp');
Route::post('/otp-page', [RegisterController::class, 'otpPage'])->name('otp.page');
Route::post('/verify-register-otp', [RegisterController::class, 'verifyRegisterOtp'])->name('verify.register.otp');
Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload-file', [App\Http\Controllers\HelperController::class, 'uploadFile'])->name('uploadFile');
Route::get('/upload-image', [App\Http\Controllers\HelperController::class, 'uploadImage'])->name('uploadImage');

});



Route::prefix('admin')->group(function () {

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/all-users', [AdminController::class, 'users'])->name('all-users');
Route::get('/vehicle-table', [AdminController::class, 'vehicleTable'])->name('vehicle-table');

});
