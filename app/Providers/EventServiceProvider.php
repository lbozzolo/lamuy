<?php

namespace Lamuy\Providers;

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
        'Lamuy\Events\Event' => [
            'Lamuy\Listeners\EventListener',
        ],
    ];

    /**
     * Register any editions for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
