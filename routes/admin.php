<?php

use App\Livewire\Admin\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminCategoryController;

Route::prefix('admin')->name('#')->middleware(['auth', 'verified'])
->group(function () {
    
    Route::resource('post', AdminPostController::class)
        ->parameter('post', 'id');

    Route::resource('category', AdminCategoryController::class)
        ->parameter('category', 'id');

    Route::get('comment', [AdminCommentController::class, 'index'])
        ->name('comment.index');

    Route::get('comment/{id}', [AdminCommentController::class, 'show'])
        ->name('comment.show');

    Route::post('comment/{comment}', [AdminCommentController::class, 'lock'])
        ->name('comment.lock');

    Route::delete('comment/{comment}', [AdminCommentController::class, 'destroy'])
        ->name('comment.destroy');
});