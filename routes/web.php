<?php

use App\Http\Controllers\{
    PageController,
    PostController,
    CommentController
};
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/teacher', 'teacher')->name('teacher');
    Route::get('/contact', 'contact')->name('contact');
});

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
]);
