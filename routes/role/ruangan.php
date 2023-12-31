<?php

use App\Http\Controllers\Ruangan\KehadiranController;
use App\Http\Controllers\Ruangan\PerizinanController;
use App\Http\Controllers\Ruangan\RuanganController;
use App\Http\Controllers\Ruangan\SiswaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.', 'middleware' => ['auth', 'role:ruangan']], function() {
    Route::get('', [RuanganController::class, 'index'])->name('home');

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function() {
        Route::get('', [SiswaController::class, 'index'])->name('home');
    });

    Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function() {
        Route::get('', [KehadiranController::class, 'index'])->name('home');
        Route::post('absen', [KehadiranController::class, 'absen'])->name('absen');
    });

    Route::group(['prefix' => 'perizinan', 'as' => 'perizinan.'], function() {
        Route::get('', [PerizinanController::class, 'index'])->name('home');
        Route::post('store', [PerizinanController::class, 'store'])->name('store');
    });
});
