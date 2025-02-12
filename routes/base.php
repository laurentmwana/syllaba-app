<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseDocumentController;


Route::get('course-document', [CourseDocumentController::class, 'index'])
    ->name('course-document.index');

Route::get('course-document/{slug}-{id}', [CourseDocumentController::class, 'show'])
    ->name('course-document.show');


Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::get('/post/{slug?}/{id?}', [PostController::class, 'show'])->name('post.show');
