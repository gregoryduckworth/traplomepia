<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\SiteSettingsRepository as SiteSettings;
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

        view()->composer('*', function($view)
        {
            $view->with('currentUser', Auth::user());
            
            // If the database is empty, then do not try and set the global_settings
            if($this->global_settings = $global_settings->lists('value', 'key')){
                $view->with('global_settings', $this->global_settings);
            }
            
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
