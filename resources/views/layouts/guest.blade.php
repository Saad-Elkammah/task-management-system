<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Task Management System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-indigo-50 via-white to-white">
            <div class="mb-4">
                <a href="/" class="flex items-center justify-center">
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-3 rounded-lg shadow-lg inline-flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                </a>
                <h1 class="text-2xl font-bold text-center mt-2">Task Management System</h1>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-6 bg-white shadow-lg overflow-hidden sm:rounded-lg border border-gray-100">
                {{ $slot }}
            </div>
            
            <div class="mt-6 text-center text-sm text-gray-500">
                <span>© {{ date('Y') }} Task Management System. All rights reserved.</span>
            </div>
        </div>
    </body>
</html>
