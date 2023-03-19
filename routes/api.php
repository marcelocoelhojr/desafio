<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('cache')->group(function () {
    Route::post('/', [JobController::class, 'filterCache']);
});

Route::prefix('job')->group(function () {
    Route::post('/create', [JobController::class, 'create']);
});

Route::prefix('address')->group(function () {
    Route::post('/create', [JobController::class, 'create']);
});
