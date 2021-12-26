<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FriendController;
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

Route::prefix('auth')
    ->name('auth.')
    ->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('register', [AuthController::class, 'register'])->name('register');

        Route::middleware('auth:sanctum')
            ->group(function () {
                Route::get('check', [AuthController::class, 'check'])->name('check');
                Route::put('update', [AuthController::class, 'update'])->name('update');
                Route::patch('update', [AuthController::class, 'update'])->name('update');
            });
    });

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'friends' => FriendController::class,
    ]);

    Route::apiResource('chats', ChatController::class)->except('index', 'update');
});
