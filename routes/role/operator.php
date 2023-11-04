<?php

use App\Http\Controllers\Operator\JadwalPelajaranController;
use App\Http\Controllers\Operator\MataPelajaranController;
use App\Http\Controllers\Operator\KehadiranController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Operator\PerizinanController;
use App\Http\Controllers\Operator\SiswaController;
use App\Http\Controllers\Operator\TenagaKependidikanController;
use App\Http\Controllers\Operator\TenagaPendidikController;
use App\Http\Controllers\Operator\RuanganController;
use App\Http\Controllers\Operator\Setting\PageController;
use App\Http\Controllers\Operator\Setting\TokenController;
use App\Http\Controllers\Operator\StorageController;
use App\Http\Controllers\Operator\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'operator', 'as' => 'operator.', 'middleware' => ['auth', 'role:operator']], function() {
    Route::get('', [OperatorController::class, 'index'])->name('home');

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
        Route::get('', [SiswaController::class, 'index'])->name('home');
        Route::get('{siswa_id}', [SiswaController::class, 'show'])->name('show');
        Route::get('download/{filetype}', [SiswaController::class, 'convert'])->name('convert');
        Route::post('store', [SiswaController::class, 'store'])->name('store');
        Route::post('import', [SiswaController::class, 'import'])->name('import');
        Route::delete('destroy/{siswaId}', [SiswaController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'tenaga-pendidik', 'as' => 'tenaga-pendidik.'], function () {
        Route::get('', [TenagaPendidikController::class, 'index'])->name('home');
        Route::post('store', [TenagaPendidikController::class, 'store'])->name('store');
        Route::delete('destroy/{dataId}', [TenagaPendidikController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'tenaga-kependidikan', 'as' => 'tenaga-kependidikan.'], function() {
        Route::get('', [TenagaKependidikanController::class, 'index'])->name('home');
        Route::post('store', [TenagaKependidikanController::class, 'store'])->name('store');
        Route::delete('destroy/{dataId}', [TenagaKependidikanController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.'], function() {
        Route::get('', [RuanganController::class, 'index'])->name('home');
        Route::get('{ruangan_id}', [RuanganController::class, 'show'])->name('show');
        Route::post('store', [RuanganController::class, 'store'])->name('store');
        Route::delete('destroy/{ruanganId}', [RuanganController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'mapel', 'as' => 'mapel.'], function () {
        Route::get('', [MataPelajaranController::class, 'index'])->name('home');
        Route::post('store', [MataPelajaranController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'japel', 'as' => 'japel.'], function () {
        Route::get('', [JadwalPelajaranController::class, 'index'])->name('home');
    });

    Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function () {
        Route::get('', [KehadiranController::class, 'index'])->name('home');
        Route::put('update/{dataId}', [KehadiranController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('home');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::delete('destroy/{dataId}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'perizinan', 'as' => 'perizinan.'], function() {
        Route::get('', [PerizinanController::class, 'index'])->name('home');
    });

    Route::group(['prefix' => 'storage', 'as' => 'storage.'], function() {
        Route::get('', [StorageController::class, 'index'])->name('home');
        Route::post('store', [StorageController::class, 'store'])->name('store');
        Route::post('download', [StorageController::class, 'show'])->name('download');
        Route::delete('destroy/{storage_id}', [StorageController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function() {
        Route::group(['prefix' => 'page', 'as' => 'page.'], function() {
            Route::get('', [PageController::class, 'index'])->name('home');
            Route::post('slider', [PageController::class, 'sliderStore'])->name('slider.store');
            Route::delete('slider/{id}', [PageController::class, 'sliderDestroy'])->name('slider.destroy');
        });

        Route::group(['prefix' => 'token', 'as' => 'token.'], function() {
            Route::get('', [TokenController::class, 'index'])->name('home');
            Route::post('store', [TokenController::class, 'store'])->name('store');
            Route::delete('destroy/{token}', [TokenController::class, 'destroy'])->name('destroy');
        });
    });
});
