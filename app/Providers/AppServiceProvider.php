<?php

namespace App\Providers;

use App\Services\Directory\ResolvePathStorage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ResolvePathStorage::class,
            fn()  => new ResolvePathStorage(env('APP_URL'))
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
