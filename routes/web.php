<?php

use App\Http\Controllers\PageController;
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

Route::middleware('guest')->group(function() {
    Route::get('/', [PageController::class, 'index']);
});

require __DIR__ . "/auth.php";
require __DIR__ . "/role/operator.php";
require __DIR__ . "/role/ruangan.php";
