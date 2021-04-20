<?php

use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\BookControllers;
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

Route::get('/', [AuthControllers::class, 'index'])->name('login');
Route::post('/', [AuthControllers::class, 'login'])->name('login.post');
Route::get('/register', [AuthControllers::class, 'create'])->name('register');
Route::post('/register', [AuthControllers::class, 'store'])->name('register.post');
Route::post('/addAdmin', [AuthControllers::class, 'addAdmin'])->name('addAdmin.post');
Route::get('/logout', [AuthControllers::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [BookControllers::class, 'index'])->name('dashboard');
    Route::get('/addAdmin', function(){
        return view('Home.addAdmin');
    })->name('addAdmin');
    Route::get('/detail/{id}', [BookControllers::class, 'show'])->name('detail');
    Route::get('/addbook',[BookControllers::class, 'create'])->name('addBook');
    Route::get('/editbook/{id}', [BookControllers::class, 'edit'])->name('editBook');
    
    Route::post('/addbook',[BookControllers::class, 'store'])->name('addBook.post');
    Route::post('/editbook/{id}', [BookControllers::class, 'update'])->name('editBook.post');
    Route::get('/delete/{id}', [BookControllers::class, 'destroy'])->name('book.delete');

});