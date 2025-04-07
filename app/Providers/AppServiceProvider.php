<?php

namespace App\Providers;
use App\View\Components\AppLayout;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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

    public function boot()
    {
        Blade::component('app-layout', AppLayout::class);
    }
}
    
