<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editUserPermission = Permission::create(["name" => "Edit User"]);
        $editCargoPermission = Permission::create(["name" => "Edit Cargo"]);
        $roleAdmin = Role::create(["name" => "Admin"]);
        $roleAdmin->syncPermissions([$editUserPermission, $editCargoPermission]);
        $roleModerator = Role::create(["name" => "Moderator"]);
        $roleModerator->syncPermissions([$editCargoPermission]);
        Role::create(["name" => "API Manager"]);
        Role::create(["name" => "Kullanıcı",]);
    }
}
