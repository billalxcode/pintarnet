<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return [
        'data' => $request->user()
    ];
});

Route::as('api.')->group(function() {
    Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'guest'], function() {
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
});

require_once __DIR__ . "/role/api/operator.php";
require_once __DIR__ . "/role/api/ruangan.php";