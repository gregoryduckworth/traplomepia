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
            $this->app->bind('App\Repositories\Contracts\\'.$model.'Interface', 'App\Repositories\Eloquent\\'.$model.'Repository');
        }
    }
}
