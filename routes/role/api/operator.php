<?php

use App\Http\Controllers\Api\Operator\RuanganController;
use App\Http\Controllers\Api\Operator\UserController;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function() {
    Route::group(['prefix' => 'operator', 'as' => 'operator', 'middleware' => ['auth:api', 'role:operator']], function() {
        Route::apiResource('users', UserController::class);
        Route::apiResource('ruangan', RuanganController::class);
    });
});
