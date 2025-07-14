<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class MessageSentSecond implements ShouldBroadcastNow
{
    use InteractsWithSockets;
    use InteractsWithBroadcasting;

    use SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
        $this->broadcastVia('reverb2');
    }

    public function broadcastOn()
    {

        return new Channel('chat');
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }

    public function broadcastConnection()
    {
        return "reverb2";
    }


}
