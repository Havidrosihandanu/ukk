<?php

// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\userController;
use App\Models\Stok;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//auth
Route::resource('/login', LoginController::class)->middleware('guest');
Route::get('/login', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/registrasi', function () {
    return view('registrasi');
});
//route resource
Route::resource('/user', userController::class)->middleware('auth');
Route::resource('/book', BookController::class)->middleware('auth');
Route::resource('/borrow', BorrowController::class)->middleware('auth');
Route::resource('/borrower', BorrowerController::class)->middleware('auth');
Route::resource('/review', ReviewController::class)->middleware('auth');
Route::get('/report', [BorrowController::class,'report'])->middleware('auth');

//borrower
Route::get('/borrows/{id}',[BorrowerController::class,'store'])->middleware('auth');
Route::get('/favorite/{id}',[BorrowerController::class,'addFavorite'])->middleware('auth');
Route::get('/favorite',[BorrowerController::class,'favorite'])->middleware('auth');
