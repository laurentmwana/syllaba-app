<?php

use App\Enums\RoleUserEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminPostController,
    AdminUserController,
    AdminLevelController,
    AdminOptionController,
    AdminCommentController,
    AdminContactController,
    AdminFacultyController,
    AdminPaymentController,
    AdminStudentController,
    AdminCategoryController,
    AdminCourseController,
    AdminCourseDocumentController,
    AdminDepartmentController,
    AdminYearAcademicController,
    AdminEventController,
    AdminNewLetterController,
    AdminProfessorController,
    AdminQuizController,
    AdminTomeController,
    DashboardController
};

$roleAdmin = sprintf("role:%s", RoleUserEnum::ADMIN->value);


Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified', $roleAdmin])->name('dashboard');

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

        Route::resource('student', AdminStudentController::class)
            ->parameter('student', 'id');

        Route::resource('level', AdminLevelController::class)
            ->parameter('level', 'id');

        Route::resource('payment', AdminPaymentController::class)
            ->parameter('payment', 'id');

        Route::resource('course-document', AdminCourseDocumentController::class)
            ->parameter('course-document', 'id');


        Route::resource('tome', AdminTomeController::class)
            ->parameter('tome', 'id');

        Route::resource('professor', AdminProfessorController::class)
            ->parameter('professor', 'id');

        Route::resource('course', AdminCourseController::class)
            ->parameter('course', 'id');

        Route::resource('event', AdminEventController::class)
            ->parameter('event', 'id');

        // OTHER

        Route::resource('user', AdminUserController::class)
            ->parameter('user', 'id');

        Route::get('contact', [AdminContactController::class, 'index'])
            ->name('contact.index');

        Route::get('contact/{id}', [AdminContactController::class, 'show'])
            ->name('contact.show');

        Route::delete('contact/{contact}', [AdminContactController::class, 'destroy'])
            ->name('contact.destroy');


        Route::get('new-letter', [AdminNewLetterController::class, 'index'])
            ->name('new-letter.index');

        Route::delete('new-letter/{id}', [AdminNewLetterController::class, 'destroy'])
            ->name('new-letter.destroy');

        Route::post('new-letter/{id}/change-state', [AdminNewLetterController::class, 'changeState'])
            ->name('new-letter.change');

        Route::resource('quiz', AdminQuizController::class)
            ->parameter('quiz', 'id');
    });
