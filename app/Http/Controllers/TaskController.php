<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    //show tasks for the logged in user
    public function index(){
        // Fetch tasks assigned to the logged-in user
        $tasks = Task::where('user_id',Auth::id())->latest()->get();
        
       
        $today = Carbon::today();
        $completedTasks = Task::where('user_id', Auth::id())->where('status', 'completed')->count();
        $overdueTasks = Task::where('user_id', Auth::id())
                    ->where('due_date', '<', $today)  ->where('status', '!=', 'completed')->count();

        $pendingTasks = Task::where('user_id', Auth::id())->where('status', '!=', 'completed')->count();
        $inProgressTasks = Task::where('user_id', Auth::id())->where('status', 'in progress')->count();
        $totalTasks = Task::where('user_id', Auth::id())->count();
        //completed rate
         $completedRate = $totalTasks > 0 ? round ($completedTasks / $totalTasks) * 100 : 0;
        $taskCounts = [
            'completed' => $completedTasks,
            'overdue' => $overdueTasks,
            'pending' => $pendingTasks,
            'in_progress' => $inProgressTasks,
            'total' => $totalTasks,
        ];

        // Pass the task counts to the view
        return view('tasks.index', compact('tasks', 'taskCounts', 'completedRate'));

        

   
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
