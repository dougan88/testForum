<?php

namespace App\Listeners;

use App\Events\ThreadCreated;
use App\Thread;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ThreadOnCreateDeleting
{

    const ALLOWED_THREADS_AMOUNT = 5;

    const MYSQL_DATETIME_FORMAT = 'Y-m-d H:i:s';

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
     * @param  ThreadCreated  $event
     * @return void
     */
    public function handle(ThreadCreated $event)
    {
        if ($this->getLastThreadCreationDateTime()) {
            Thread::where('created_at', '<', $this->getLastThreadCreationDateTime())->delete();
        }
    }

    private function getLastThreadCreationDateTime()
    {
        $fifthThread = Thread::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->offset(self::ALLOWED_THREADS_AMOUNT - 1)
            ->limit(1)
            ->first();
        return $fifthThread ? $fifthThread
            ->created_at
            ->format(self::MYSQL_DATETIME_FORMAT) : null;
    }
}
