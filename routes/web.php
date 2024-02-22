<?php

// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\userController;
use App\Models\Borrow;
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
Route::get('/', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->middleware('auth')->name('logout');

//admmin and operator route
Route::get('/dashboardd', [DashboardController::class,'dashboard'])->middleware('auth');
Route::resource('/user', userController::class)->middleware('auth');
Route::resource('/book', BookController::class)->middleware('auth');
Route::post('/category/store',[BookController::class,'categoryStore'])->middleware('auth');
Route::resource('/borrow', BorrowController::class)->middleware('auth');
Route::get('/report', [BorrowController::class,'report'])->middleware('auth');
Route::resource('/review', ReviewController::class)->middleware('auth');
// Route::get('/reportt/search', [BorrowController::class,'search'])->middleware('auth');

//borrower route
Route::resource('/borrowerr', BorrowerController::class)->middleware('borrower');
Route::get('//borrower/cancel/{id}', [BorrowerController::class,'borrowerCancel'])->middleware('borrower');
Route::get('/category/{id}', [BorrowerController::class,'borrowerCategory'])->middleware('borrower');
Route::get('/borrows/{bookCode}/{id}',[BorrowerController::class,'store'])->middleware('borrower');
Route::get('/favorite/{id}',[BorrowerController::class,'addFavorite'])->middleware('borrower');
Route::get('/favorite',[BorrowerController::class,'favorite'])->middleware('borrower');
Route::get('/favorite/delete/{id}',[BorrowerController::class,'favoriteDelete'])->middleware('borrower');
Route::get('/reviews/{id}',[ReviewController::class,'review'])->middleware('borrower');
Route::post('/reviews/{id}',[ReviewController::class,'reviewPost'])->middleware('borrower');
Route::get('/history',[BorrowerController::class,'history'])->middleware('borrower');
Route::get('/borrow/confirm/{id}',[BorrowController::class,'borrowConfirm'])->middleware('auth');
Route::get('/return/confirm/{id}',[BorrowController::class,'returnConfirm'])->middleware('auth');
