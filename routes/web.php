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

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::post('logout', 'logout')->name('logout');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'register_store')->name('register_store');
});

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
]);
