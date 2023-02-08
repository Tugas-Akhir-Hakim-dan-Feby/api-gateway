<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RefreshTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::post('/login', LoginController::class)->name('api.auth.login');

    Route::post('/refresh', RefreshTokenController::class)->name('api.auth.refresh');

    Route::middleware('auth:api')->group(function () {

        Route::post('/logout', LogoutController::class)->name('api.auth.logout');
    });
});
