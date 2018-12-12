<?php

namespace App\Providers;

use App\Events\ThreadCreated;
use App\Events\ThreadResponseCreated;
use App\Listeners\ThreadOnCreateDeleting;
use App\Listeners\ThreadResponseOnCreateEmailSending;
use App\ThreadResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        ThreadCreated::class => [
            ThreadOnCreateDeleting::class,
        ],
        ThreadResponseCreated::class => [
            ThreadResponseOnCreateEmailSending::class,
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

        //
    }
}
