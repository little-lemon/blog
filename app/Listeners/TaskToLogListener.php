<?php

namespace App\Listeners;

use App\Events\TaskAdded;
use App\Events\TaskDeled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class TaskToLogListener
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
 
    public function onAddTask(TaskAdded $event)
    {
        $task = $event->task;
        Log::info('增加了task', ['id' => $task->id, 'name' => $task->name]);
    }
 
    public function onDelTask(TaskDeled $event)
    {
        $task = $event->task;
        Log::info('删除了task', ['id' => $task->id, 'name' => $task->name]);
    }
 
    public function subscribe($events)
    {
        $events->listen('App\Events\TaskAdded','App\Listeners\TaskToLogListener@onAddTask');
 
        $events->listen('App\Events\TaskDeled','App\Listeners\TaskToLogListener@onDelTask');
    }
}
