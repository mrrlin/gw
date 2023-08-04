<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\User\RegisterController;
use App\Http\Controllers\Api\V1\User\LoginController;
use App\Http\Controllers\Api\V1\User\LogoutController;
use App\Http\Controllers\Api\V1\CustomCategoryController;
use App\Http\Controllers\Api\V1\CategoryProductController;
use App\Http\Controllers\Api\V1\FavoriteController;

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


Route::get('/', function () {
    return view('index');
});

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/category-products', [CustomCategoryController::class, 'index']);

Route::get('/category/{id}', [CustomCategoryController::class, 'show']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login', [LoginController::class, 'login']);


Route::post('/register', [RegisterController::class, 'registerForm']);
Route::get('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LogoutController::class, 'logout']);

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/favorites', [FavoriteController::class, 'show']);

Route::get('/about', function () {
  return view('about');
});

Route::get('/download', function () {
  return view('download-marker');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
