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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::post('register', [\App\Http\Controllers\Api\V1\User\RegisterController::class, 'index']);
    Route::post('login', [\App\Http\Controllers\Api\V1\User\LoginController::class, 'index']);

    Route::apiResource('products', \App\Http\Controllers\Api\V1\ProductController::class);

    Route::post('favorites', [\App\Http\Controllers\Api\V1\FavoriteController::class, 'favoritesAdd']); // /api/favorites и передать продукт post
    Route::apiResource('categoryProducts', \App\Http\Controllers\Api\V1\CategoryProductController::class);
    Route::apiResource('customCategories', \App\Http\Controllers\Api\V1\CustomCategoryController::class);

});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [\App\Http\Controllers\Api\V1\User\LogoutController::class, 'logout']);
});
