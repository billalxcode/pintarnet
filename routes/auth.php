<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'guest'], function() {
    Route::prefix('login')->as('login.')->group(function() {
        Route::get('', [LoginController::class, 'index'])->name('home');
        Route::post('', [LoginController::class, 'check'])->name('check');
    });
});

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'auth'], function () {
    Route::get('redirect', function(Request $request) {
        $user = $request->user();
        $role = $user->getRoleNames()[0];

        if ($role === 'operator') {
            return redirect()->route('operator.home');
        } else if ($role === 'siswa') {
            return redirect()->route('ruangan.home');
        } else if ($role === 'guru') {
            return redirect()->route('guru.home');
        }
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});