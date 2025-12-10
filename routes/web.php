<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'viewHome'])->name('home');
Route::get('/post/{id}', [PostController::class, 'viewPost'])->name('post');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth','admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/users', [UserController::class, 'viewUsers'])->name('users');
    Route::get('/posts', [PostController::class, 'viewDashPosts'])->name('posts');
    Route::get('/categories', [CategoryController::class, 'viewCategories'])->name('categories');
});
