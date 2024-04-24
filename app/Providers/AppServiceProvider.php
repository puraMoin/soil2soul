<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\MenuLinkController;

class AppServiceProvider extends ServiceProvider
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
        /*Current Prefix*/
        // $currentPrefix = '';
        // $path = request()->path();
        // $segments = explode('/', $path);

        // if(isset($segments[0]) && $segments[0] !== ''){
        //      $currentPrefix = $segments[0];
        // }


        /*Menu Links*/
        View::composer('*', function ($view) {
            $menuLinkController = new MenuLinkController();
            $menuLinks = $menuLinkController->getMenuLinks();
                
            // dd($menuLinks);    

            $view->with('menuLinks', $menuLinks);
      
        });


        // View::share('currentPrefix', $currentPrefix);
        
    }
}
