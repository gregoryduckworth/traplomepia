<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\SiteSettingsInterface as SiteSettings;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(SiteSettings $global_settings)
    {
        // If the App is running in the console (usually during a migrate)
        // then we do not need to set the global settings just yet
        if(!\App::runningInConsole()){
            $this->global_settings = $global_settings->lists('value', 'key');
        }

        view()->composer('*', function($view)
        {
            $view->with('currentUser', Auth::user());
            $view->with('global_settings', $this->global_settings);            
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
