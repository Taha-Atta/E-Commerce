<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('dashboard.*',function($view){


        if(!Cache::has('categories_count')){
            Cache::remember('categories_count',3600,function(){
                return Category::count();
            });
        }
        if(!Cache::has('brands_count')){
            Cache::remember('brands_count',3600,function(){
                return Brand::count();
            });
        }
        if(!Cache::has('admins_count')){
            Cache::remember('admins_count',3600,function(){
                return Admin::count();
            });
        }

        view()->share([
        'categories_count'=> Cache::get('categories_count'),
        'brands_count'=> Cache::get('brands_count'),
        'admins_count'=> Cache::get('admins_count'),
        ]);
    });
    }
}
