<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app');  // Render the Blade view that includes Vue's router-view
})->where('any', '.*');
