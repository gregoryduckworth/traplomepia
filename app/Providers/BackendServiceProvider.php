<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'Permission',
            'Role',
            'SiteSettings',
            'User',
        ];

        foreach($models as $model){
            \Log::info($model.'Interface');
            $this->app->bind('App\Repositories\Interface\\'.$model.'Interface', 'App\Repositories\Eloquent\\'.$model.'Repository');
        }
    }
}
