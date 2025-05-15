@extends('layout-app')

@section('content')
    <div class="p-5">


        <!-- Jobs container -->
        @include('navigation.topbar')
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

            <!--total tasks-->
            <div class ="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500">Total Tasks</h3>
                <p class="text-3xl font-bold">{{ $totalTasks }}</p>
                <p class="text-green-500 text-sm">↑ Increased from last month </p>

            </div>
            <!--completed tasks-->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500">Completed tasks</h3>
                <p class="text-3xl font-bold">{{ $completedTasks }}</p>
                <p class="text-green-500 text-sm">↑ Increased from last month</p>
            </div>

            <!--pending tasks-->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500">Pending tasks</h3>
                <p class="text-3xl font-bold">{{ $pendingTasks }}</p>
                <p class="text-green-500 text-sm">↑ Increased from last month</p>
            </div>
            <!--in progress tasks-->
            <!--pending tasks-->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-500">InProgress tasks</h3>
                <p class="text-3xl font-bold">{{ $inProgressTasks }}</p>
                <p class="text-green-500 text-sm">↑ Increased from last month</p>
            </div>
        </div>
        <!-- Task Progress chart Section -->
        <div class="bg-white p-6 rounded-lg shadow mb-9">
            <h2 class="text-2xl mb-3">Task Progress</h2>
            <div id="chart1">
                @include('charts.taskprogress')
            </div>
        </div>

        <!-- Task list Section -->
        <div class="bg-white p-6 rounded shadow ">
            <div class=" flex justify-between items-center mb-4">
                <h2 class=" text-2xl mb-3">Tasks</h2>
                <a href="{{ route('tasks.index') }}" class="text-blue-500 text-sm hover:underline">See all</a>
            </div>
            <table class="min-w-full text-left ">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Task ID</th>
                        <th class="py-2 px-4 border-b">Task Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">User Name</th>
                        <th class="py-2 px-4 border-b">Due Date</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $task->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->due_date }}</td>
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
                            <td class="py-2 px-4 border-b">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <a href="#" class="text-red-500 hover:text-red-700 ml-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
