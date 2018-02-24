<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Task;
Use App\Events\TaskAdded;
Use App\Events\TaskDeled;
use Illuminate\Support\Facades\Event; 

class TaskController extends Controller
{
    /* public function create(Request $request)
    {
        $name = $request->input('name');
        $task = new Task;
        $task->name = $name;
        $result = $task->save();
        Event::fire(new TaskAdded($task));
    } */

    public function create(Request $request)
    {
        $name = $request->input('name');
        $task = new Task;
        $task->name = $name;
        $result = $task->save();
        Event::fire(new TaskAdded($task));
        Event::fire(new TaskDeled($task));
    }
}
