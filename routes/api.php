<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/password-reset', [AuthController::class, 'resetpassword'])->name('password.reset');
// google Authentication Api
Route::group(['middleware' => ['web']], function () {
    // your routes here
    Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});


Route::middleware('auth:sanctum')->group(function () {
    // end Auth api
    Route::get('/get-me', [AuthController::class, 'getMe'])->name('get.me');
    // delete user
    Route::delete('/user-delete', [AuthController::class, 'deleteUser'])->name('user-delete');
    // end getMe api
    Route::middleware('role:admin')->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/search/product', [ProductController::class, 'search'])->name('search.product');
    });
    Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('update.Password');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
