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
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserPostController;

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/logout',[LogoutController::class,'store'])->name('logout');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/post',[PostsController::class,'index'])->name('posts');
Route::post('/post',[PostsController::class,'store']);
Route::delete('/post/{post}',[PostsController::class,'destroy'])->name('posts.destroy');
Route::get('post/{post}',[PostsController::class,'show'])->name('posts.show');
Route::post('/post/{post}/likes',[LikesController::class,"store"])->name('posts.likes');
Route::delete('/post/{post}/likes',[LikesController::class,"destroy"])->name('posts.likes');


Route::get('/user/{user:name}/post',[UserPostController::class,'index'])->name('users.posts');