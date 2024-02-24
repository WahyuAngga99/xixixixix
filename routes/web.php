<?php

use App\Http\Controllers\commentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/home', \App\Http\Controllers\HomeController::class);
Route::resource('/like', \App\Http\Controllers\likecontroller::class);
Route::resource('/upload', \App\Http\Controllers\uploadController::class);
Route::resource('/', \App\Http\Controllers\welcomeController::class);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::post('/comments', [commentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}',  [commentController::class, 'destroy'])->name('comments.destroy');

