<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('api.user.index');
    Route::post('/', [UserController::class, 'store'])->name('api.user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('api.user.show');
    Route::put('/{id}', [UserController::class, 'update'])->name('api.user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('api.user.destroy');
});
