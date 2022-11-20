<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\User\MeController;
use App\Http\Controllers\Api\User\SettingController;

// authentication route
Route::group(['middleware' => ['auth:api']], function(){
    // logout route
    Route::post('/logout', LogoutController::class);
    // me route
    Route::get('/me', MeController::class);
    // setting route
    Route::controller(SettingController::class)->group(function(){
        Route::put('/setting/profile', 'updateProfile');
        Route::put('/setting/password', 'updatePassword');
    });
});

// register route
Route::post('/register', RegisterController::class);
// login route
Route::post('/login', LoginController::class);

