<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;


Route::get('document', [DocumentController::class, 'index'])
    ->name('document.index');

Route::get('document/{slug}/{id}', [DocumentController::class, 'show'])
    ->name('document.show');
