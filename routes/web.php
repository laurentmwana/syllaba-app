<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NumberPhoneController;
use App\Http\Controllers\WelcomeController;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', fn () => view('base.about'))->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::post('/post', PostController::class)->name('post.index');

Route::middleware(['auth', 'verified', 'with-role:admin', 'number-phone:fail'])
    ->group(function () {
        Route::get('/completed-number-phone', [NumberPhoneController::class, 'index'])
            ->name('number-phone.index');
        Route::post('/completed-number-phone/update', [NumberPhoneController::class, 'update'])
            ->name('number-phone.update');
    });

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';


