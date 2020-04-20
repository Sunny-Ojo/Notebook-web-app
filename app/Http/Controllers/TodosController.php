<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::where('user_id', auth()->user()->id)->paginate(10);
        return view('todos\index')->with('todo', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:5',
            'category' => 'required',
            'time' => 'required',
            'date' => 'required',
        ]);
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->user_id = auth()->user()->id;
        $todo->category = $request->category;
        $todo->time = $request->time;
        $todo->date = $request->date;
        $todo->save();

        return redirect('/todos')->with('success', 'A new todo has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos\show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todo = Todo::find($id);
        if ($todo->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Access Denied');
        }
        return view('todos\edit')->with('todo', $todo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:5',
            'time' => 'required',
            'date' => 'required',
        ]);
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->user_id = auth()->user()->id;
        $todo->category = $request->category;
        $todo->time = $request->time;
        $todo->date = $request->date;
        $todo->save();
        return redirect('/todos')->with('success', 'Todo has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //
        $todo = Todo::find($id);
        if ($todo->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Permission Denied');
        }

        $todo->delete();
        return redirect('/todos')->with('success', 'Todo has been Deleted successful');
    }
}