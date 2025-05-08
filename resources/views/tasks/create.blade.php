@extends('layout-app')
@section('content')
    <div class="p-4  w-full bg-white rounded-md shadow">
        <h2 class="text-2xl">Add New Task</h2>
        <form action="" method="POST" class=" space-y-4">
            @csrf
            <div class="flex items-center mb-4 ">
                <label for="title" class="w-40 text-sm font-medium text-gray-700">Task Title:</label>
                <input type="text " name="title" id="title" placeholder="Task Title" class="mt-1 border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div class="flex items-center">
                <label for="description" class="w-40 text-sm font-medium text-gray-700">Task Description:</label>
                <input type="text" name="description" id="description" placeholder="Enter Task Description"
                       class=" border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div class="flex items-center mb-4 ">
                <label for="status" class="w-40 text-sm font-medium text-gray-700">Status</label>
                <input type="text " name="status" id="status" placeholder="Task Title" class="mt-1 border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div class="flex items-center mb-4 ">
                <label for="due_date" class="w-40 text-sm font-medium text-gray-700">Due date:</label>
                <input type="date " name="due_date" id="due_date" placeholder="Enter due date" class="mt-1 border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            
            <button type="submit" class="  bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Task</button>

        </form>
    </div>
@endsection
