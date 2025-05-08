<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //show tasks for the logged in user
    public function index(){
        // Fetch tasks assigned to the logged-in user
        $tasks = Task::where('user_id',Auth::id())->latest()->get();
        

        return view('tasks.index',compact('tasks'));
    }
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
        //validate the request
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'due_date'=>'required|date',

        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(), // Assign task to the logged-in user
        ]);
        return redirect()->route('tasks.index')->with('success','Task created successfully');
    }
    
}
