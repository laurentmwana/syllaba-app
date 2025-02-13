<?php

use App\Enums\RoleUserEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\CourseDocumentController;

Route::get('course-document', [CourseDocumentController::class, 'index'])
    ->name('course-document.index');

Route::get('course-document/{slug}-{id}', [CourseDocumentController::class, 'show'])
    ->name('course-document.show');

Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::get('/post/{slug}/{id}', [PostController::class, 'show'])->name('post.show');

$roleStudent = sprintf("role:%s", RoleUserEnum::STUDENT->value);

Route::middleware(['auth', 'verified', $roleStudent])
    ->group(function () {

        Route::resource('card', CardController::class)
            ->except(['create', 'store'])
            ->parameter('card', 'id');

        Route::post('/card/{courseDocumentId}/create', [CardController::class, 'add'])
            ->name('card.add');

        Route::post('/card/remove-all', [CardController::class, 'RemoveAll'])
            ->name('card.remove-all');

        Route::post('/news-letter/subscribe', [NewsLetterController::class, 'add'])
            ->name('news-letter.add');

        Route::post('/news-letter/remove', [NewsLetterController::class, 'remove'])
            ->name('news-letter.remove');

        Route::get('/news-letter/state', [NewsLetterController::class, 'index'])
            ->name('news-letter.index');
    });
