<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'M Seno', // IT
            'email' => 'admin@gmail.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'Super Admin'
        ]);

        User::create([
            'name' => 'Sales Admin', // Sales
            'email' => 'rina@gmail.com',
            'password' => Hash::make('rina123'),
            'role' => 'Sales Admin'
        ]);

        User::create([
            'name' => 'Inventory Staff',
            'email' => 'inventory@gmail.com',
            'password' => Hash::make('inventory123'),
            'role' => 'Inventory Admin'
        ]);

        User::create([
            'name' => 'Front Office',
            'email' => 'fo@gmail.com',
            'password' => Hash::make('frontoffice123'),
            'role' => 'Front Office'
        ]);
    }
}