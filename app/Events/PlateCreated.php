<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlateCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

	public $image;
	public $plateId;

	/**
	 * Create a new event instance.
	 *
	 * @param $image
	 */
    public function __construct($image,$plateId)
    {
	    $this->image = $image;
	    $this->plateId = $plateId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
