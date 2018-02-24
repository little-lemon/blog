<?php

namespace App\Listeners;

use App\Events\TaskAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class SaveTaskToLogListener
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
     * @param  TaskAdded  $event
     * @return void
     */
    public function handle(TaskAdded $event)
    {
        $task = $event->task;
        Log::alert('添加了一个任务', ['id' => $task->id, 'name' => $task->name]);
    }
}
