<?php

use App\Http\Controllers\AkmAuthController;
use App\Http\Controllers\BoosterpackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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
Route::get('login', [AkmAuthController::class, 'index']);
Route::post('login', [AkmAuthController::class, 'customLogin']);
Route::get('registration', [AkmAuthController::class, 'registration']);
Route::post('registration', [AkmAuthController::class, 'customRegistration']);


Route::group([
    'prefix' => 'ajax'
], function () {
    Route::post('login', [AkmAuthController::class, 'ajaxCustomLogin']);
    Route::get('get_all_posts', [PostController::class, 'getAllPosts']);
    Route::get('get_boosterpacks', [BoosterpackController::class, 'getBoosterpacks']);
    Route::get('post/{post_id}', [PostController::class, 'getPostById']);
    Route::get('logout', [AkmAuthController::class, 'logout']);
});

Route::get('test', function (){
    return view('test');
});
