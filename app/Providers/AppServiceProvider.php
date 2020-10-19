<?php

namespace App\Providers;
use App\Models\Category;
use View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        View::share('name','M.I.Saad');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*',function ($view){
                    $view->with('categories',Category::where('publication_status',1)->get());
                });
    }
}
