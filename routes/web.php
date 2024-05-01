<?php

use App\Http\Controllers\{AuthController, PageController, PostController, CommentController};
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/teacher', 'teacher')->name('teacher');
    Route::get('/contact', 'contact')->name('contact');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register_store');


Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
]);
