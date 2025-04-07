<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled in the controller using policies
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = Auth::user();
        
        // If user doesn't have edit tasks permission, they can only update status to completed
        if (!$user->hasPermissionTo('edit tasks')) {
            return [
                'status' => ['required', Rule::in(['completed'])],
            ];
        }
        
        // Full validation rules for users with edit permission
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
            'due_date' => 'date|after_or_equal:today',
            'assigned_users' => 'required|array',
            'assigned_users.*' => 'exists:users,id',
        ];
    }
}
