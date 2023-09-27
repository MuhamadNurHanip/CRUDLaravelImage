<?php

use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cb', function () {
    return view('coba');
});
//route::view('/book', 'book');
Route::get('/book', [BookController::class, 'index'])->name("book");
Route::post('/book', [BookController::class, 'store'])->name("store");
Route::get('/book/create', [BookController::class, 'create'])->name("books.create");
Route::post('/book/{book}', [BookController::class, 'update'])->name("books.update");
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name("books.destroy");
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name("books.edit");
//Route::get('/book/edit', [BookController::class, 'edit'])->name("books.edit");
