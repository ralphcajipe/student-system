<?php

namespace App\Providers;

use App\Models\Students;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import the View class

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
        View::share('title', '🎒 Student Admin'); // Use the View class

        // view::composer('students.index', function ($view) {
        //     $view->with('students', Students::all());
        // });
    }
}
