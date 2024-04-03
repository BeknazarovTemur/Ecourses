<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'home'])->name('home');
Route::get('/about', [PageController::class,'about'])->name('about');
Route::get('/course', [PageController::class,'course'])->name('course');
Route::get('/teacher', [PageController::class,'teacher'])->name('teacher');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
