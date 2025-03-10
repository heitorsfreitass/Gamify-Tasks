<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() 
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'required|integer|min:1',
        ]);
        
        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'points' => $request->points,
            'completed' => false,
        ]);

        return redirect()->route('tasks')->with('success', 'Tarefa criada com sucesso!');
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return abort(403);
        }

        $task->update(['completed' => !$task->completed]);

        if ($task->completed) {
            Auth::user()->increment('points', $task->points);
        } else {
            // Se for marcado como não concluído, subtrair os pontos
            Auth::user()->decrement('points', $task->points);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'required|integer|min:1',
        ]);

        $task->update($request->only(['title', 'description', 'points']));

        return redirect()->route('tasks')->with('success', 'Tarefa atualizada!');
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    public function updateDetails(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'points'      => 'required|integer|min:1',
        ]);

        $task->update($request->only(['title', 'description', 'points']));

        return redirect()->route('tasks')->with('success', 'Tarefa atualizada!');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return abort(403);
        }

        $task->delete();
        return redirect()->route('tasks')->with('success', 'Tarefa removida!');
    }
}
