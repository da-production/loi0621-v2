<?php

namespace App\Providers;

use App\Events\AdministrateurUpdatedEvent;
use App\Listeners\AdministrateurUpdatedListener;
use App\Models\Administrateur;
use App\Observers\AdministrateurObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AdministrateurUpdatedEvent::class => [
            AdministrateurUpdatedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Administrateur::observe(AdministrateurObserver::class);
        //
    }
}
