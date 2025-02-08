<?php

// app/Providers/ViewServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Define a global variable that will be available in all views
        View::share('company_name', 'VTECH CAREER PORTAL');
    }
}

// php artisan make:provider ViewServiceProvider


