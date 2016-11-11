<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Repositories\Events\RepositoryEntityCreated' => [
            'App\Repositories\Listeners\CleanCacheRepository',
        ],

        'App\Repositories\Events\RepositoryEntityUpdated' => [
            'App\Repositories\Listeners\CleanCacheRepository',
        ],

        'App\Repositories\Events\RepositoryEntityDeleted' => [
            'App\Repositories\Listeners\CleanCacheRepository',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        foreach ($this->listen as $event => $listeners) {
            foreach ($listeners as $listener) {
                Event::listen($event, $listener);
            }
        }
    }
}
