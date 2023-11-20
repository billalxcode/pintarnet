<?php

use App\Http\Controllers\Api\Ruangan\KehadiranController;
use App\Http\Controllers\Api\Ruangan\RuanganController;
use App\Http\Controllers\Api\Ruangan\SiswaController;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function() {
    Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.', 'middleware' => ['auth:api', 'role:ruangan']], function() {
        Route::get('', [RuanganController::class, 'index'])->name('home');

        Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function() {
            Route::get('', [SiswaController::class, 'index'])->name('home');
            Route::get('{siswa_id}', [SiswaController::class, 'show'])->name('show');
        });

        Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function() {
            Route::get('', [KehadiranController::class, 'index'])->name('home');
            Route::post('absen', [KehadiranController::class, 'absen'])->name('absen');
        });
    });
});
