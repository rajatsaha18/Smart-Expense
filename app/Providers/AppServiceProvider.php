<?php

namespace App\Providers;


use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('update', function($user,$category){
            return $user->id === $category->user_id;

        });
        // bootstrap 5
        Paginator::useBootstrapFive();
    }
}
