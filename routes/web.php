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

Route::get('/', function () {
    return redirect()->route('posts');
})->name('index');


Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('auth.login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'verify'])->name('auth.login');
Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('auth.register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('auth.register');

Route::get('test', function () {
    return \App\Models\Post::first()->comments;
});
Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');