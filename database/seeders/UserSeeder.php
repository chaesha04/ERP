<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@gmail.com'], // <== email sebagai kunci unik
            [
                'name' => 'Superadmin',
                'role' => 'Superadmin',
                'status' => 'active',
                'password' => bcrypt('superadmin123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Sales',
                'role' => 'Sales',
                'status' => 'active',
                'password' => bcrypt('admin123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'inventory@gmail.com'],
            [
                'name' => 'Inventory',
                'role' => 'Inventory',
                'status' => 'active',
                'password' => bcrypt('inventory123'),
            ]
        );
    }
}
