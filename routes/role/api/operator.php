<?php

use App\Http\Controllers\Api\Operator\RuanganController;
use App\Http\Controllers\Api\Operator\UserController;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function() {
    Route::group(['prefix' => 'operator', 'as' => 'operator', 'middleware' => ['auth:api', 'role:operator']], function() {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
            Route::get('', [UserController::class, 'index'])->name('all');
            Route::post('', [UserController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.'], function() {
            Route::get('', [RuanganController::class, 'index'])->name('all');
            Route::post('', [RuanganController::class, 'store'])->name('store');
        });
    });
});
