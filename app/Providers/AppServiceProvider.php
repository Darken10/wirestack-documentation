<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->addNamespace('layouts', resource_path('views/layouts'));

        // Register anonymous component namespace so <x-docs::demo> resolves
        // to resources/views/components/docs/demo.blade.php
        Blade::anonymousComponentPath(resource_path('views/components/docs'), 'docs');
    }
}
