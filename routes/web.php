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
Route::redirect('home','/');
Route::get('profile/{id?}',[\App\Http\Controllers\HomeController::class,'profile'])->middleware('auth');
Route::view('register','register_login')->middleware('guest');
Route::post('register',[\App\Http\Controllers\AuthController::class,'register'])->name('registerPost');
Route::post('login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::post('post',[\App\Http\Controllers\HomeController::class,'createPost'])->name('createPost');
Route::post('comment',[\App\Http\Controllers\HomeController::class,'postComment'])->name('postComment');
Route::get('like',[\App\Http\Controllers\HomeController::class,'pressLike'])->name('pressLike');
Route::view('login','register_login')->middleware('guest');
Route::get('logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
