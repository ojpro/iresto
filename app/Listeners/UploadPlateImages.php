<?php

namespace App\Listeners;

use App\Models\Category;
use App\Http\Traits\UploadPlateImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UploadPlateImages
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
     * @return string
     */
    public function handle($event)
    {
       return UploadPlateImage::save($event->image,$event->plateId);
    }
}
