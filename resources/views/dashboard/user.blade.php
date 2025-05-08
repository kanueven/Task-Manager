@extends('layout-app')

@section('content')
 <div class="grid grid-cols-1  md:grid-cols-4 gap-4 mb-8">
    <!--personal tasks-->
    <div class ="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">Total Tasks</h3>
        <p class="text-3xl font-bold">13</p>
        <p class="text-green-500 text-sm">↑ Increased from last month </p>

    </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">pending tasks</h3>
        <p class="text-3xl font-bold">9</p>
        <p class="text-green-500 text-sm">↑ Increased from last month</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-500">completed tasks</h3>
        <p class="text-3xl font-bold">4</p>
        <p class="text-green-500 text-sm">↑ Increased from last month</p>
    </div>

    <!--personal tasks progress bar-->
 
 <!-- personal task lists -->
</div>

@endsection