<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = RolesEnum::ADMIN;

        // create default admin
        $email = 'admin@domain.com';
        $admin = User::query()->firstOrCreate(compact('email'), [
            'name' => 'Admin Domain',
            'email' => $email,
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);

        $admin->syncRoles(Role::findByName($adminRole));
    }
}
