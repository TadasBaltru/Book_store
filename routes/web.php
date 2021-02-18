<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Models\Book;

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

Route::get('/', [HomeController::class, 'index', Book::class, 'index'])->name('home');
Route::get('/show/{book}', [BookController::class, 'show'])->name('show');


Auth::routes();


Route::group(['middleware'=>'auth'],function(){
    Route::resource('books', BookController::class);
    Route::resource('users', UsersController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('ratings', RatingController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::resource('profiles', ProfileController::class);



});


