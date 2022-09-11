<?php

use App\Http\Controllers\BlogController;
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
Route::prefix('blogs')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{slug}', 'blogPost')->name('post');
    Route::get('categories/{slug}', 'blogCategory')->name('category');
    Route::get('post/search', 'search')->name('search');
});
