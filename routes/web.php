<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;


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

Route::get('/', [HomeController::class, 'index', \App\Models\Book::class, 'index'])->name('home');
Route::get('/show/{book}', [BookController::class, 'show'])->name('show');


Auth::routes();


Route::group(['middleware'=>'auth'],function(){
    Route::resource('books', BookController::class);
    Route::resource('users', UsersController::class);
    Route::resource('reviews', \App\Http\Controllers\ReviewController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::resource('profiles', \App\Http\Controllers\ProfileController::class);



});


