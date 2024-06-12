<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $editor = Role::create(['name' => 'editor']);

        // Permissions for each table
        $permissions = [
            'users' => ['create', 'read', 'update', 'delete'],
            'staff' => ['create', 'read', 'update', 'delete'],
            'customers' => ['create', 'read', 'update', 'delete'],
            'services' => ['create', 'read', 'update', 'delete'],
            'appointments' => ['create', 'read', 'update', 'delete'],
            'payments' => ['create', 'read', 'update', 'delete'],
            'pages' => ['create', 'read', 'update', 'delete'],
            'settings' => ['create', 'read', 'update', 'delete'],
        ];

        // Create permissions
        foreach ($permissions as $table => $actions) {
            foreach ($actions as $action) {
                Permission::create(['name' => "$table.$action"]);
            }
        }

        // Assign permissions to roles
        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'users.read',
            'users.update',
            'staff.read',
            'staff.update',
            'customers.read',
            'services.read',
            'appointments.create',
            'appointments.read',
            'appointments.update',
            'payments.read',
            'pages.read',
        ]);

        $editor->givePermissionTo([
            'customers.update',
            'appointments.create',
            'appointments.read',
            'appointments.update',
            'appointments.delete',
        ]);
    }
}
