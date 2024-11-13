<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register',[AuthController::class,'register'])->name('user.register');
Route::post('/login',[AuthController::class,'login'])->name('user.login');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
// end Auth api
Route::get('/get-me', [AuthController::class, 'getMe'])->name('get.me')->middleware('auth:sanctum');
// end getMe api

Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth:sanctum');
