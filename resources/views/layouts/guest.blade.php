<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Authentication Links for Guest Users -->
            <div class="flex justify-end p-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('home') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline-block">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-gray-700 hover:text-blue-600">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Main Content Area -->
            <div class="font-sans text-gray-900 antialiased">
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>
