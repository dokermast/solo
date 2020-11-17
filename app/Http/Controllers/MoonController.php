<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Tasks;

class MoonController extends Controller
{
    public function tasks()
    {
        $tasks= Tasks::all();
        return response()->json($tasks, 201);
    }

    public function task($id)
    {
        $task= Task::find($id);
        return response()->json($task, 201);
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json($task, 200);
    }

    public function delete()
    {

    }
}
