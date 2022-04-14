<?php

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('workSpace', \App\Http\Controllers\WorkSpaceController::class);
    Route::apiResource('features', \App\Http\Controllers\FeaturesController::class);
    Route::apiResource('appartenir', \App\Http\Controllers\AppartenirController::class);
    Route::apiResource('location', \App\Http\Controllers\LocationController::class);
});

