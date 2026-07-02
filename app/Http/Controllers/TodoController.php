<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('todos.index', compact('todos'));
    }
}
