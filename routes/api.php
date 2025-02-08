<?php

use App\Http\Controllers\APIs\ApiAutoFieldUniversity;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::get('/auto-field-university', ApiAutoFieldUniversity::class)
        ->name('auto-field');
});
