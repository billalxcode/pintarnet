<?php

use App\Http\Controllers\Pendidik\PendidikController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pendidik', 'middleware' => ['auth', 'role:pendidik'], 'as' => 'pendidik.'], function() {
    Route::get('', [PendidikController::class, 'index'])->name('home');
});