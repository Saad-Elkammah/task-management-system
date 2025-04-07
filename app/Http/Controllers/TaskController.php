<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Task::query();
        
        // Create a base query for dashboard stats that won't be affected by filters
        $statsQuery = Task::query();
        
        // If user doesn't have permission to view all tasks, only count tasks assigned to them for stats
        if (!$user->hasPermissionTo('view tasks')) {
            $statsQuery->assignedTo($user->id);
        }
        
        // Get counts for dashboard stats
        $totalTasks = $statsQuery->count();
        $pendingTasks = (clone $statsQuery)->where('status', 'pending')->count();
        $completedTasks = (clone $statsQuery)->where('status', 'completed')->count();

        // Filter by status if provided
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Filter by user if provided and user has permission to view all tasks
        if ($user->hasPermissionTo('view tasks') && $request->has('user_id') && $request->user_id != 'all') {
            $query->assignedTo($request->user_id);
        }

        // If user doesn't have permission to view all tasks, only show tasks assigned to them
        if (!$user->hasPermissionTo('view tasks')) {
            $query->assignedTo($user->id);
        }

        $tasks = $query->with(['creator', 'assignedUsers'])->latest()->paginate(10);
        $users = $user->hasPermissionTo('view tasks') ? User::where('id', '!=', $user->id)->get() : [];

        return view('tasks.index', compact('tasks', 'users', 'totalTasks', 'pendingTasks', 'completedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Use policy to check if user can create tasks
        $this->authorize('create', Task::class);

        $users = User::where('id', '!=', Auth::id())->get();
        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // Use policy to check if user can create tasks
        $this->authorize('create', Task::class);

        $validated = $request->validated();

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'due_date' => $validated['due_date'],
            'created_by' => Auth::id(),
        ]);

        $task->assignedUsers()->attach($validated['assigned_users']);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // Use policy to check if user can view this task
        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // Use policy to check if user can update this task
        $this->authorize('update', $task);

        $users = User::where('id', '!=', Auth::id())->get();
        $assignedUserIds = $task->assignedUsers->pluck('id')->toArray();

        return view('tasks.edit', compact('task', 'users', 'assignedUserIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Use policy to check if user can update this task
        $this->authorize('update', $task);

        $user = Auth::user();
        $validated = $request->validated();
        
        // If user doesn't have edit tasks permission, they can only update status to completed
        if (!$user->hasPermissionTo('edit tasks')) {
            $task->update(['status' => $validated['status']]);
            return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
        }

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'due_date' => $validated['due_date'],
        ]);

        $task->assignedUsers()->sync($validated['assigned_users']);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Use policy to check if user can delete this task
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    /**
     * Mark a task as completed.
     */
    public function markAsCompleted(Task $task)
    {
        // Use policy to check if user can update this task
        $this->authorize('update', $task);

        $task->update(['status' => 'completed']);

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
    }
}
