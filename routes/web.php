<?php

use App\Http\Middleware;
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
    return view('welcome');
})->name('home');

Route::resource('users', 'App\Http\Controllers\UserController');

Route::post('/signup', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'App\Http\Controllers\UserController@postSignin',
    'as' => 'signin'
]);

Route::get('/logout', [
    'uses' => 'App\Http\Controllers\UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/account', [
    'uses' => 'App\Http\Controllers\UserController@getAccount',
    'as' => 'account'
]);

Route::post('/upateaccount', [
    'uses' => 'App\Http\Controllers\UserController@getAccount',
    'as' => 'account.save'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'App\Http\Controllers\UserController@getUserImage',
    'as' => 'account.image'
]);

Route::get('/dashboard', [
    'uses' => 'App\Http\Controllers\PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createpost', [
    'uses' => 'App\Http\Controllers\PostController@postCreatePost',
    'as' => 'post.create'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'App\Http\Controllers\PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::post('/postedits', [
    'uses' => 'App\Http\Controllers\PostController@postEditPost',
    'as' => 'postedits'
])->middleware('auth');

Route::post('/like', [
    'uses' => 'App\Http\Controllers\PostController@postLikePost',
    'as' => 'like'
])->middleware('auth');

/*Route::post('/like', [PostController::class,'likeStore'])->name('api.like.store');*/