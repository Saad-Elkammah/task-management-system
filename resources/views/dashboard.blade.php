<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">{{ __('Welcome to Task Management System') }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl overflow-hidden">
                <div class="px-8 py-12 md:py-20 md:flex md:items-center md:justify-between">
                    <div class="md:w-1/2 text-white">
                        <h1 class="text-3xl md:text-4xl font-bold mb-4">Manage Your Tasks with Ease</h1>
                        <p class="text-indigo-100 text-lg mb-8">A powerful task management system designed to help teams collaborate efficiently and track progress effectively.</p>
                        <div class="space-x-4">
                            <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-5 py-3 bg-white text-indigo-700 rounded-lg font-semibold text-sm shadow-md hover:bg-indigo-50 transition-colors duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                View My Tasks
                            </a>
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-5 py-3 border-2 border-white text-white rounded-lg font-semibold text-sm hover:bg-white hover:text-indigo-700 transition-colors duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Create New Task
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="hidden md:block md:w-1/2 pl-10">
                        <div class="relative">
                            <div class="absolute -top-6 -left-6 w-20 h-20 bg-purple-500 rounded-full opacity-50"></div>
                            <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-indigo-500 rounded-full opacity-30"></div>
                            <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-xl p-6 shadow-lg border border-white border-opacity-20">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">TM</div>
                                        <div class="ml-3">
                                            <h3 class="text-white font-semibold">Task Manager</h3>
                                            <p class="text-xs text-indigo-100">Your productivity companion</p>
                                        </div>
                                    </div>
                                    <div class="text-white opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="bg-white bg-opacity-10 p-3 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="h-4 w-4 rounded-full bg-green-400 mr-2"></div>
                                            <p class="text-white text-sm font-medium">Website Redesign</p>
                                        </div>
                                        <div class="mt-2 text-xs text-indigo-100">Update the company website with new branding</div>
                                        <div class="mt-2 flex justify-between items-center">
                                            <div class="flex -space-x-2">
                                                <div class="h-6 w-6 rounded-full bg-indigo-300 border-2 border-white"></div>
                                                <div class="h-6 w-6 rounded-full bg-purple-300 border-2 border-white"></div>
                                            </div>
                                            <span class="text-xs text-indigo-100">Due: Jun 15</span>
                                        </div>
                                    </div>
                                    <div class="bg-white bg-opacity-10 p-3 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="h-4 w-4 rounded-full bg-yellow-400 mr-2"></div>
                                            <p class="text-white text-sm font-medium">Quarterly Report</p>
                                        </div>
                                        <div class="mt-2 text-xs text-indigo-100">Prepare Q2 financial report for stakeholders</div>
                                        <div class="mt-2 flex justify-between items-center">
                                            <div class="flex -space-x-2">
                                                <div class="h-6 w-6 rounded-full bg-indigo-300 border-2 border-white"></div>
                                            </div>
                                            <span class="text-xs text-indigo-100">Due: Jul 5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="h-12 w-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Task Management</h3>
                    <p class="text-gray-600">Create, assign, and track tasks with ease. Set due dates, priorities, and monitor progress in real-time.</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="h-12 w-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Team Collaboration</h3>
                    <p class="text-gray-600">Work together seamlessly with your team. Assign tasks to team members and keep everyone on the same page.</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="h-12 w-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Progress Tracking</h3>
                    <p class="text-gray-600">Monitor task progress with visual indicators. Get insights into team productivity and project status.</p>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('tasks.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                        <div class="h-10 w-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">View All Tasks</h4>
                            <p class="text-sm text-gray-600">See all tasks assigned to you or created by you</p>
                        </div>
                    </a>

                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('tasks.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                            <div class="h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Create New Task</h4>
                                <p class="text-sm text-gray-600">Add a new task and assign it to team members</p>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('tasks.index', ['status' => 'pending']) }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                            <div class="h-10 w-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Pending Tasks</h4>
                                <p class="text-sm text-gray-600">View tasks that need your attention</p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>

            <!-- User Guide -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Getting Started</h3>
                </div>
                <div class="p-6">
                    <div class="prose max-w-none">
                        <p>Welcome to the Task Management System! Here's how to get started:</p>
                        
                        <ol class="space-y-2 mt-4">
                            <li class="flex items-start">
                                <span class="bg-indigo-100 text-indigo-600 rounded-full h-6 w-6 flex items-center justify-center font-medium mr-2 mt-0.5">1</span>
                                <span><strong>View your tasks</strong> - Go to the Tasks page to see all tasks assigned to you</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-indigo-100 text-indigo-600 rounded-full h-6 w-6 flex items-center justify-center font-medium mr-2 mt-0.5">2</span>
                                <span><strong>Update task status</strong> - Mark tasks as completed when you finish them</span>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li class="flex items-start">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full h-6 w-6 flex items-center justify-center font-medium mr-2 mt-0.5">3</span>
                                    <span><strong>Create and assign tasks</strong> - Create new tasks and assign them to team members</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full h-6 w-6 flex items-center justify-center font-medium mr-2 mt-0.5">4</span>
                                    <span><strong>Manage team workload</strong> - Monitor task progress and balance workload across your team</span>
                                </li>
                            @else
                                <li class="flex items-start">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full h-6 w-6 flex items-center justify-center font-medium mr-2 mt-0.5">3</span>
                                    <span><strong>Filter tasks</strong> - Use filters to find specific tasks by status</span>
                                </li>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
