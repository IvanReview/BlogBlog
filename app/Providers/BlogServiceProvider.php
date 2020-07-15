<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use function foo\func;
use App\Category;
class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->topMenu();
    }

    public function topMenu(){
        View::composer('layouts.header', function($view){
           $view->with('categoriess', Category::where('parent_id', 0)->where('published',1)->get());
        });
    }
}
