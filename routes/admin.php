<?php

use App\Enums\RoleUserEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminOptionController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminFacultyController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDepartmentController;
use App\Http\Controllers\Admin\AdminYearAcademicController;

$roleAdmin = sprintf("role:%s", RoleUserEnum::ADMIN->value);

Route::prefix('admin')->name('#')->middleware(['auth', 'verified', $roleAdmin])
->group(function () {
    
    // BLOG

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


    // UNIVERSITY

    Route::resource('faculty', AdminFacultyController::class)
        ->parameter('faculty', 'id');

    Route::resource('department', AdminDepartmentController::class)
        ->parameter('department', 'id');
    
    Route::resource('option', AdminOptionController::class)
        ->parameter('option', 'id');

        Route::resource('category', AdminCategoryController::class)
        ->parameter('category', 'id');

    Route::get('year-academic', [AdminYearAcademicController::class, 'index'])
        ->name('year-academic.index');

    Route::get('year-academic/{id}', [AdminYearAcademicController::class, 'show'])
        ->name('year-academic.show');

    Route::post('year-academic/{id}', [AdminYearAcademicController::class, 'closed'])
        ->name('year-academic.closed');

    Route::delete('year-academic/{id}', [AdminYearAcademicController::class, 'destroy'])
        ->name('year-academic.destroy');
});