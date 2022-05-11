<?php

use App\Http\Controllers\AkmAuthController;
use App\Http\Controllers\BoosterpackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
Route::get('/', function () {
    return view('main');
});

/**
 * Auth Routes
 */
Route::get('login', [AkmAuthController::class, 'index'])->name('login');
Route::post('login', [AkmAuthController::class, 'customLogin']);
Route::get('registration', [AkmAuthController::class, 'registration']);
Route::post('registration', [AkmAuthController::class, 'customRegistration']);


Route::group([
    'prefix' => 'ajax'
], function () {
    Route::post('login', [AkmAuthController::class, 'ajaxCustomLogin']);
    Route::get('get_all_posts', [PostController::class, 'getAllPosts']);
    Route::get('get_boosterpacks', [BoosterpackController::class, 'getBoosterpacks']);
    Route::get('post/{post_id}', [PostController::class, 'getPostByIdAjax']);
    Route::get('logout', [AkmAuthController::class, 'logout']);
    Route::post('add_comment', [CommentController::class, 'storeCommentAjax']);
    Route::get('get-like/{model_type}/{id}', [HomeController::class, 'getLikeAjax'])->middleware('auth');
    Route::post('add_money', [UserController::class, 'addMoney']);
});

Route::get('post/{post_id}', [PostController::class, 'getPostById']);

Route::group([
    'middleware' => 'auth'
], function () {
    Route::post('add_comment', [CommentController::class, 'storeComment']);
    Route::get('get-like/{model_type}/{id}', [HomeController::class, 'getLike']);
});
