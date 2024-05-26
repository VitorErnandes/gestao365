<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Recuperar todas as permissões
        $permissions = Permission::all();

        // Atribuir todas as permissões à regra super-admin
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }
        }
    }
}
