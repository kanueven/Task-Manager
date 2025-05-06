<x-guest-layout>
    <!-- Main Content for the Welcome Page -->
    <div class="text-center py-12 px-6">
        <h1 class="text-4xl font-semibold mb-4">Welcome to Our Application</h1>
        <p class="text-xl text-gray-600 mb-8">Please login or register to get started.</p>
        
        <div class="flex justify-center">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Login</a>
            <a href="{{ route('register') }}" class="px-6 py-3 ml-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">Register</a>
        </div>
    </div>
</x-guest-layout>
