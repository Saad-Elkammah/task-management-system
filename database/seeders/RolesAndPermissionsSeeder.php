<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        // Create permissions
        $permissions = [
            'view tasks',
            'create tasks',
            'edit tasks',
            'delete tasks',
            'assign tasks',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);
        
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view tasks']);
        
        // Assign roles to existing users based on their current 'role' field
        $users = User::all();
        foreach ($users as $user) {
            if ($user->name === 'Admin User') {
                $user->assignRole('admin');
            } else {
                $user->assignRole('user');
            }
        }
    }
}
