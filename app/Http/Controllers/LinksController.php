<?php

namespace App\Http\Controllers;

use App\Todo;
use DB;

class LinksController extends Controller
{
    //
    public function complete($id)
    {
        $todo = Todo::find($id);
        $id = $todo->id;
        $complete = DB::update('update todos set completed = 1 where id = ?', [$id]);
        return redirect()->back()->with('success', 'Great Job! Todo has been successsfully completed');
    }
    public function completedTodos()
    {
        $getTodos = DB::select('select * from todos where user_id = ? AND completed = ?', [auth()->user()->id, true]);
        // $getTodos = Todo::where('user_id', 'completed', [auth()->user()->id, false])->paginate(1);
        return view('todos\completedtodo')->with('todo', $getTodos);
    }
}