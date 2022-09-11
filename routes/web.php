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

Route::get('/', [App\Http\Controllers\HomeController::class , 'index'])->name('home');
Route::get('/detail/{slug}', [App\Http\Controllers\HomeController::class , 'postDetail'])->name('post.detail');
Route::get('/search/{keyword?}', [App\Http\Controllers\HomeController::class , 'search'])->name('search');

Route::get('/cateogries', [App\Http\Controllers\CategoryController::class , 'index']);
