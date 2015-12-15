<?php

namespace App\Listeners;

use App\Events\CarWasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use File;

class CarImageDelete
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
     * @param  CarWasDeleted  $event
     * @return void
     */
    public function handle(CarWasDeleted $event)
    {
        $car = $event->car;
        $imgPaths = $car->image;
        $imgPaths = json_decode($imgPaths);
        $directory = explode('/', $imgPaths[0]);
        $directory = implode('/', [$directory[1], $directory[2], $directory[3]]);

        exec('rm -r ' . public_path($directory));
        //Storage::deleteDirectory(public_path($directory));     
        // foreach ($imgPaths as $imgPath) {
        //    \File::delete(public_path($imgPath)); 
        // }
    
        
        
    }
}
