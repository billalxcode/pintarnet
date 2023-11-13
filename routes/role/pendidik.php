<?php

use App\Http\Controllers\Pendidik\PendidikController;
use App\Http\Controllers\Pendidik\PerizinanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pendidik', 'middleware' => ['auth', 'role:pendidik'], 'as' => 'pendidik.'], function() {
    Route::get('', [PendidikController::class, 'index'])->name('home');

    Route::group(['prefix' => 'perizinan', 'as' => 'perizinan.'], function() {
        Route::get('', [PerizinanController::class, 'index'])->name('home');
        Route::post('update', [PerizinanController::class, 'update'])->name('update');
    });
});