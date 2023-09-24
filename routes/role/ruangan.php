<?php

use App\Http\Controllers\Ruangan\RuanganController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.', 'middleware' => ['auth', 'role:ruangan']], function() {
    Route::get('', [RuanganController::class, 'index'])->name('home');
});