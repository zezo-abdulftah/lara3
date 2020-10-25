<?php

namespace App\Listeners;

use App\Events\vidioviewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class increse_viewer
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
     * @param  object  $event
     * @return void
     */
    public function handle(vidioviewer $event)
    {
        $this->update($event->vidio);

    }
     function update($vidio){
        $vidio->viewer= $vidio->viewer+1;
        $vidio->save();
    }
}
