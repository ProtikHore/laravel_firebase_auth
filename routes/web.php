<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;

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

Route::get('clear', function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'loadLogin']);
Route::post('login', [LoginController::class, 'login']);

Route::get('otp/login', [LoginController::class, 'loadOtpLogin']);
Route::post('otp/login', [LoginController::class, 'otpLogin']);
Route::get('otp/mobile/number/check', [LoginController::class, 'checkNumber']);

Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('logout', [LoginController::class, 'logout']);
