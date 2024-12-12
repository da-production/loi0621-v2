<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $message;
    private $id;
    private $owner;
    public function __construct($msg,$id,$owner)
    {
        //
        $this->message = $msg;
        $this->id = $id;
        $this->owner = $owner;
    }

    public function broadcastOn()
    {
        return new Channel('public.chatmessage.'.$this->id);
    }

    public function broadcastAs()
    {
        return 'chat-message';
    }

    public function broadcastWith()
    {
        return [
            'message'       => $this->message,
            'owner'         => $this->owner,
        ];
    }
}
