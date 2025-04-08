<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;


Route::get('/courses', [CourseController::class, 'index']);


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog1',[BlogController::class,'blog1']);