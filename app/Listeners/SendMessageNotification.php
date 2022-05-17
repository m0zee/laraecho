<?php

namespace App\Listeners;

use App\Events\MessageProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageNotification
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
     * @param  \App\Events\MessageProcessed  $event
     * @return void
     */
    public function handle(MessageProcessed $event)
    {
        //
    }
}
