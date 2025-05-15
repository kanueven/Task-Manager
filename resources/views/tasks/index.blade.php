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
                 <td class="py-2 px-4 border-b">
                                @php
                                    $status = $task->calculated_status;
                                    $statusColor = match ($status) {
                                        'completed' => 'bg-green-200 text-green-600',
                                        'overdue' => 'bg-red-200 text-red-600',
                                        'in progress' => 'bg-blue-200 text-blue-600',
                                        default => 'bg-yellow-200 text-yellow-600',
                                    };
                                @endphp
                                <span class="px-2 py-1 rounded {{ $statusColor }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                 <td class="py-2 px-4 border-b">{{ $task->user->name }}</td>
                 <td class="py-2 px-4 border-b">{{ $task->due_date }}</td>
                 <td class="py-2 px-4 border-b">
                      <a href="" class="text-blue-500 hover:underline">Edit</a>
                      <form action="" method="POST" style="display:inline;">
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
