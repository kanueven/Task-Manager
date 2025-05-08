@extends('layout-app')
@section('content')
<div class=" p-6 min-h-screen  bg-white rounded-md">
   
   <div class="flex justify-between items-center mb-4"> 
    <h2 class="text-2xl font-bold text-gray-800">All Tasks</h2>
    <a href="{{ route('tasks.create') }}" class=" bg-blue-600  rounded-lg px-6 py-3 text-white">New task</a></div>
    <div>
        <table>
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Task Name</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">User Name</th>
                    <th class="py-2 px-4 border-b">Due Date</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>

            <tbody>
               @foreach ($tasks as $task )
                <tr>
                 <td class="py-2 px-4 border-b">{{ $task->title }}</td>
                 <td class="py-2 px-4 border-b">{{ $task->description }}</td>
                 <td class="py-2 px-4 border-b">{{ $task->status }}</td>
                 <td class="py-2 px-4 border-b">{{ $task->user->name }}</td>
                 <td class="py-2 px-4 border-b">{{ $task->due_date }}</td>
                 <td class="py-2 px-4 border-b">
                      <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline">Edit</a>
                      <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                      </form>
                 </td>
               @endforeach

               
            </tbody>
        </table>
    </div>

</div>
@endsection
