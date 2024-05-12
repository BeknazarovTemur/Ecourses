<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPostNotifaction
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostProcessed $event): void
    {
        Log::alert('New post created.', ['post'=>$event->post]);
    }
}
