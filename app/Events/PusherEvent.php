<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $text;

    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($text, $id)
    {
        $this->text = $text;
        $this->id = $id;
        //$this->broadcastOn();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['laravel-broadcast-channel'];
    }

//    public function broadcastAs()
//    {
//        return 'test';
//    }
//
//    public function broadcastWith()
//    {
//        return ['texts'=>$this->text, 'ids'=>$this->id];
//    }


}
