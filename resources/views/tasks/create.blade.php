<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">{{ __('Create New Task') }}</span>
            </h2>
            <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-600 to-gray-700 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:from-gray-700 hover:to-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Back to Tasks') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-100">
                <div class="p-0">
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Task Details
                        </h3>
                    </div>
                    <div class="p-6 text-gray-900">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="bg-white rounded-lg p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="h-8 w-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-800">Basic Information</h3>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <x-input-label for="title" :value="__('Task Title')" class="text-gray-700 font-medium" />
                                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full rounded-lg" :value="old('title')" placeholder="Enter task title" required autofocus />
                                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                        </div>

                                        <div>
                                            <x-input-label for="description" :value="__('Description')" class="text-gray-700 font-medium" />
                                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" placeholder="Describe the task in detail">{{ old('description') }}</textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="h-8 w-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-800">Status & Timeline</h3>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <x-input-label for="status" :value="__('Current Status')" class="text-gray-700 font-medium" />
                                            <select id="status" name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm">
                                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                        </div>

                                        <div>
                                            <x-input-label for="due_date" :value="__('Due Date')" class="text-gray-700 font-medium" />
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <x-text-input id="due_date" name="due_date" type="date" class="mt-1 block w-full pl-10 rounded-lg" :value="old('due_date')" />
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="bg-white rounded-lg p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="h-8 w-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-800">Team Assignment</h3>
                                    </div>
                                    
                                    <div>
                                        <x-input-label for="assigned_users" :value="__('Assign To Team Members')" class="text-gray-700 font-medium" />
                                        <p class="text-sm text-gray-500 mb-3">Select the team members who will work on this task</p>
                                        <div class="mt-2 space-y-2 max-h-96 overflow-y-auto p-3 border border-gray-200 rounded-lg bg-gray-50">
                                            @foreach($users as $user)
                                                <div class="flex items-center p-2 hover:bg-white rounded-lg transition-colors duration-150">
                                                    <input id="user_{{ $user->id }}" name="assigned_users[]" type="checkbox" value="{{ $user->id }}" 
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                        {{ in_array($user->id, old('assigned_users', [])) ? 'checked' : '' }}>
                                                    <label for="user_{{ $user->id }}" class="ml-3 flex items-center cursor-pointer">
                                                        <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-800 font-medium mr-2">
                                                            {{ substr($user->name, 0, 1) }}
                                                        </div>
                                                        <div>
                                                            <span class="block text-sm font-medium text-gray-900">{{ $user->name }}</span>
                                                            <span class="block text-xs text-gray-500">{{ $user->email }}</span>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('assigned_users')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        @error('assigned_users.*')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg p-5 border border-indigo-100 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <div class="h-8 w-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-800">Tips</h3>
                                    </div>
                                    <ul class="space-y-2 text-sm text-gray-600">
                                        <li class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Provide a clear and descriptive title</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Set a realistic due date</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Assign tasks to appropriate team members</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                {{ __('Create Task') }}
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
