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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::name('admin.')->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('posts', App\Http\Controllers\Admin\PostsController::class);
        Route::resource('categories', App\Http\Controllers\Admin\CategoriesController::class);
        Route::get('getSubcategories/{categories}', [App\Http\Controllers\Admin\CategoriesController::class, 'getSubcategories'])->name('sub-cat');
        Route::resource('blogs', App\Http\Controllers\Admin\BlogsController::class);
    });
    Auth::routes();
});