<?php

use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Operator\SiswaController;
use App\Http\Controllers\Operator\TenagaPendidikController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'operator', 'as' => 'operator.', 'middleware' => ['auth', 'role:operator']], function() {
    Route::get('', [OperatorController::class, 'index'])->name('home');

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
        Route::get('', [SiswaController::class, 'index'])->name('home');
        Route::post('store', [SiswaController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'tenaga-pendidik', 'as' => 'tenaga-pendidik.'], function () {
        Route::get('', [TenagaPendidikController::class, 'index'])->name('home');
        Route::post('store', [TenagaPendidikController::class, 'store'])->name('store');
    });
});