<?php

namespace App\Listeners;

use App\Events\ThreadResponseCreated;
use App\Mail\ThreadResponded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ThreadResponseOnCreateEmailSending
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ThreadResponseCreated  $event
     * @return void
     */
    public function handle(ThreadResponseCreated $event)
    {
        Mail::to($event->threadResponse->thread->user->email)
            ->send(new ThreadResponded($event->threadResponse->thread));
    }
}
