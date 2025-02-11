<?php

use App\Http\Controllers\APIs\SubscriptionToNewLetterController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('/subscribe/create/new-letter', [SubscriptionToNewLetterController::class, 'create'])
        ->name('new-letter.create');

    Route::delete('/subscribe/remove/new-letter', [SubscriptionToNewLetterController::class, 'remove'])
        ->name('new-letter.remove');
});
