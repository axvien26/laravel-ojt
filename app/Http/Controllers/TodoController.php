<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::query()->orderByDesc('id')->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'completed' => ['sometimes', 'boolean'],
            'deadline' => ['nullable', 'date'],
        ]);

        $validated['completed'] = $request->boolean('completed');

        Todo::create($validated);

        return redirect()->route('todos.index')->with('status', 'Todo created.');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'completed' => ['sometimes', 'boolean'],
            'deadline' => ['nullable', 'date'],
        ]);

        $validated['completed'] = $request->boolean('completed');

        $todo->update($validated);

        return redirect()->route('todos.index')->with('status', 'Todo updated.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('status', 'Todo deleted.');
    }
}

