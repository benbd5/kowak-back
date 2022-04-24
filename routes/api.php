<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UsersController;
use App\Models\Users;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user', function (Request $request) {
//        return $request->user();
        $item = Users::with('workSpaceAppartenir', 'workSpaceLocation')->findOrFail($request->user()->userId);
        $user = FavoriteController::getFavorites();
        return response()->json(compact('item', 'user'));
    });
    Route::apiResource('workSpace', WorkSpaceController::class);
    Route::apiResource('appartenir', AppartenirController::class);
    Route::apiResource('location', LocationController::class);
//    Route::apiResource('userProfile', UsersController::class);

    // Toggle favorite workSpace for current user
    Route::get('like/{slug}',FavoriteController::class.'@like');
});

