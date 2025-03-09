<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RolesEnum::all();
        $allPermissions = PermissionsEnum::all();

        // Seed permissions
        foreach ($allPermissions as $allPermission) {
            Permission::query()->firstOrCreate(['name' => $allPermission]);
        }

        // Seed roles
        foreach ($roles as $roleName) {
            $role = Role::query()->firstOrCreate(['name' => $roleName]);

            if ($roleName == 'Admin') {
                $role->syncPermissions($allPermissions);
            }
        }
    }
}
