<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);

        $task = Task::create([
            'title' => $data['title'],
        ]);

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $request->validate(['is_completed' => 'required|boolean']);
        $task->update(['is_completed' => $request->is_completed]);

        return response()->json($task);
    }

    public function pending()
    {
        return response()->json(Task::where('is_completed', false)->get());
    }
}

