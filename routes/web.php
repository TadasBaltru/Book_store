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
use App\Mail\ReportMail;

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
Route::get('/books/report/{book}', [BookController::class, 'report'])->name('report');



Auth::routes();


Route::group(['middleware'=>'auth'],function(){
    Route::put('/profile/{user}/ChangePassword', [ProfileController::class, 'ChangePassword'])->name('changePassword');

    Route::resource('books', BookController::class);
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoryController::class)->middleware('admin');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    Route::resource('profiles', ProfileController::class);







});


