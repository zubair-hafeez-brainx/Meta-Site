<?php

use App\Http\Controllers\API\MetaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('register')->group(function () {
    Route::post('users', [RegisterController::class, 'store']);
});

Route::post('login', [LoginController::class, 'login'])->name('app.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('metadata', [MetaController::class, 'getMetaData']);
    Route::get('fetch', [MetaController::class, 'fetchMeta']);
});
