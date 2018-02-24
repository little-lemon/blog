<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Task;
use Illuminate\Support\Facades\Event; 

class TaskDeled extends Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;
 
    /**
     * TaskAdded constructor.
     * 构造函数,注入一个Task实例
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }
 
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
