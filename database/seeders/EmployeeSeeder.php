<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create(); 
    
        Employee::create([
            'name' => 'Rina Lumbantoruan',
            'division' => 'Sales Team',
            'role' => 'Sales Admin',
            'email' => 'rina@gmail.com',
            'password' => Hash::make('rina123'),
        ]);
        Employee::create([
            'name' => 'M Seno',
            'division' => 'IT Department',
            'role' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        Employee::create([
            'name' => 'Inventory Staff',
            'division' => 'Inventory Department',
            'role' => 'Inventory Admin',
            'email' => 'inventory@gmail.com',
            'password' => Hash::make('inventory123'),
        ]);
        Employee::create([
            'name' => 'Front Office Staff',
            'division' => 'Front Office',
            'role' => 'Front Office',
            'email' => 'frontoffice@gmail.com',
            'password' => Hash::make('frontoffice123'),
        ]);
    }
    
}