<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TenagaPendidikController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => '/', 'as' => 'guest.'], function() {
    Route::get('', [PageController::class, 'index'])->name('home');

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function() {
        Route::get('', [SiswaController::class, 'index'])->name('home');
        Route::get('{siswa_id}', [SiswaController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'tenaga-pendidik', 'as' => 'tenaga-pendidik.'], function() {
        Route::get('', [TenagaPendidikController::class, 'index'])->name('home');
    });
});

require __DIR__ . "/auth.php";
require __DIR__ . "/role/operator.php";
require __DIR__ . "/role/ruangan.php";
