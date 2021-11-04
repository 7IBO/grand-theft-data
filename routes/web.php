<?php

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('index');


Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('auth.login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'verify'])->name('auth.login');
Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('auth.register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('auth.register');
Route::post('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('auth.logout');

Route::get('test', function () {
    return \App\Models\Post::first()->comments;
});

Route::get('friends', [\App\Http\Controllers\FriendshipController::class, 'index'])->name('friends');
Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::post('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('comment/create', [\App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');