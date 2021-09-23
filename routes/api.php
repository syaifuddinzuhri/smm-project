<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('login', [AuthController::class, 'adminLogin']);

        Route::middleware(['auth:admin-api'])->group(function () {
            Route::post('logout', [AuthController::class, 'adminLogout']);
        });
    });

    Route::prefix('member')->group(function () {
        Route::post('login', [AuthController::class, 'memberLogin']);
        Route::post('register', [AuthController::class, 'memberRegister']);
        Route::middleware(['auth:member-api'])->group(function () {
            Route::post('logout', [AuthController::class, 'memberlogout']);
        });
    });
});