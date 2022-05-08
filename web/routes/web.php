<?php

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


Route::group([
    'prefix' => 'ajax'
], function () {
    Route::get('get_all_posts', [PostController::class, 'getAllPosts']);
    Route::get('get_boosterpacks', [BoosterpackController::class, 'getBoosterpacks']);
    Route::get('post/{post_id}', [PostController::class, 'getPostById']);
});

Route::get('test', function (){
    return view('test');
});
