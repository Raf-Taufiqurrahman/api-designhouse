<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\MeController;
use App\Http\Controllers\Api\Auth\RegisterController;

// authentication route
Route::group(['middleware' => ['auth:api']], function(){
    // logout route
    Route::post('/logout', LogoutController::class);
    // me route
    Route::get('/me', MeController::class);
});

// register route
Route::post('/register', RegisterController::class);
// login route
Route::post('/login', LoginController::class);

