<?php

use App\Http\Controllers\SPAController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify/{id}/{hash}', [SPAController::class, 'verify'])
    ->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

Route::fallback(SPAController::class);
