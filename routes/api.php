<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppartenirController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\WorkSpaceController;

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
    Route::apiResource('workSpace', WorkSpaceController::class);
    Route::apiResource('features', FeaturesController::class);
    Route::apiResource('appartenir', AppartenirController::class);
    Route::apiResource('location', LocationController::class);
});

