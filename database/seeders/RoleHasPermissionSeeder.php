<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Master
        $master_permissions = Permission::all();
        Role::findOrFail(1)->syncPermissions($master_permissions->pluck('id'));

        // Usuario
        $usuario_permissions = $master_permissions->filter(function ($permission) {
            return  substr($permission->name, 0, 5) != 'user_' &&
                    substr($permission->name, 0, 5) != 'role_' &&
                    substr($permission->name, 0, 11) != 'permission_';
        });

        Role::findOrFail(6)->syncPermissions($usuario_permissions);

    }
}
