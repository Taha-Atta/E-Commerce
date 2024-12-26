<?php

namespace App\Providers;

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
        Paginator::usebootstrap();
        foreach(config('permessions_en') as $config_permissions => $value) {
            Gate::define($config_permissions, function ($auth) use ($config_permissions) {
                return $auth->hasAccess($config_permissions);
            });
        }
    }
}
