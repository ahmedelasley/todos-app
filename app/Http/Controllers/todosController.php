<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class todosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
        //OR //return view('todos')->with('todos', $todos);
        //OR //return view('todos', compact('todos'));
    }

    public function show(Todo$id) {
        return view('todos.show')->with('todo', $id);
    }

    public function create() {
        return view('todos.create');
    }

    public function store(Request $request) {
        //return $request->all();
        /*
        $request->validate([
            'todoTitle' => 'required | min:6',
            'todoDescription' => 'required'
        ]);
        */
        $this->validate($request, [
            'todoTitle' => 'required | min:6',
            'todoDescription' => 'required | min:6'
        ]);
        $todo = new Todo();
        $todo->title = $request->todoTitle;
        $todo->description = $request->input('todoDescription');
        $todo->save();
        $request->session()->flash('success', 'Todo Created Successfully');
        return redirect('/todos');
    }

    public function edit(Todo $id) {
        return view('todos.edit')->with('todo', $id);
    }

    public function update(Request $request, Todo $id) {
        $this->validate($request, [
            'todoTitle' => 'required | min:6',
            'todoDescription' => 'required | min:6'
        ]);
        $id->title = $request->get('todoTitle');
        $id->description = $request->get('todoDescription');
        $id->save();
        $request->session()->flash('success', 'Todo Edited Successfully');
        return redirect('/todos');

    }

    public function destroy(Todo $id) {
        $id->delete();
        session()->flash('success', 'Todo Deleted Successfully');
        return redirect('/todos');
    }

    public function complete(Todo $id) {
        $id->completed = true;
        $id->save();
        session()->flash('success', 'Todo Completed Successfully', 500);
        return redirect('/todos');
    }
}
