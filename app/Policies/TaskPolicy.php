<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // All authenticated users can view tasks
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        // Users can view tasks if they created them or are assigned to them
        // Admins can view all tasks
        return $user->hasPermissionTo('view tasks') || 
               $user->id === $task->created_by || 
               $task->assignedUsers->contains($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only users with 'create tasks' permission (admins) can create tasks
        return $user->hasPermissionTo('create tasks');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        // Users can update tasks if they created them
        // Users with 'edit tasks' permission (admins) can edit any task
        return $user->hasPermissionTo('edit tasks') || $user->id === $task->created_by;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        // Only users with 'delete tasks' permission (admins) can delete tasks
        return $user->hasPermissionTo('delete tasks');
    }

}
