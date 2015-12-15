<?php

namespace App\Listeners;

use App\Events\PageWasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use File;

class ImageDelete
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
     * @param  PageWasDeleted  $event
     * @return void
     */
    public function handle(PageWasDeleted $event)
    {
        $page = $event->page;
        $imgPath = $page->image;
        $file_path = $imgPath;
    
        \File::delete(public_path($file_path)); 
        
    }
}
