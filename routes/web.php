<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

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


Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('auth.login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'verify'])->name('auth.login');
Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('auth.register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('auth.register');



Route::middleware([Authenticate::class])->group(function () {

    Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('index');
    Route::post('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('auth.logout');


    Route::get('friends', [\App\Http\Controllers\FriendshipController::class, 'index'])->name('friends');
    Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::post('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('comment/create', [\App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
    Route::get('add-friend', [\App\Http\Controllers\FriendshipController::class, 'add'])->name('add-friend');
    Route::post('friends', [\App\Http\Controllers\FriendshipController::class, 'store'])->name('friends');
});