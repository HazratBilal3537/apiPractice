<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'register'])->name('user.register');
Route::post('/login',[AuthController::class,'login'])->name('user.login');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/password-reset', [AuthController::class, 'resetpassword'])->name('password.reset');

Route::middleware('auth:sanctum')->group(function(){
// end Auth api
Route::get('/get-me', [AuthController::class, 'getMe'])->name('get.me');
// end getMe api
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('update.Password');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
