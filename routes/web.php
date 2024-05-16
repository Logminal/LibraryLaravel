<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AllBooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
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

// Route::get('/', function () {
//     return view('main');
// })->name('home');

Route::get('/', [MainController::class, 'index'])->name('home');


// AUTH
Route::get('/reg', [AuthController::class, 'storeReg'])->name('regStore');

Route::resource('/login', AuthController::class)->only('create', 'store');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin panel
Route::resource('/admin', AdminPanelController::class);
Route::get('/admin/formUpdate/{id}', [AdminPanelController::class, 'formUpdate'])->name('formUpdate');
Route::get('/person/books', [AdminPanelController::class, 'allBooks'])->name('allBooks');
Route::get('/person/books/accept/{id}', [AdminPanelController::class, 'allBooksAccept'])->name('allBooksAccept');
Route::delete('/person/books/reject/{id}', [AdminPanelController::class, 'allBooksReject'])->name('allBooksReject');

// Add Book
Route::get('/add/book', [MainController::class, 'addPersonBook'])->name('addPersonBook');
Route::post('/add/book', [MainController::class, 'addPersonBookStore'])->name('addPersonBookStore');

// All Books
Route::get('/all/books/person', [AllBooksController::class, 'index'])->name('allBooksPerson');
Route::get('/all/books/download/{id}', [AllBooksController::class, 'store'])->name('allBooksStore');
Route::get('/all/expectation/books/download/{id}', [AllBooksController::class, 'storeExDown'])->name('book.expectation.download');

// Categories
Route::resource('/category', CategoryController::class);
