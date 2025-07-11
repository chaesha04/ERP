<?php

namespace Database\Seeders;

use App\Models\VisitorDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
    
        for ($i = 0; $i < 100; $i++) {
            VisitorDetail::create([
                'visitor_name' => $faker->name(),
                'group_name' => $faker->word(),
                'company_number' => $faker->phoneNumber(),
                'phone_number' => $faker->phoneNumber(),
                'country' => $faker->country(),
                'email' => $faker->email(),
                'group_address' => $faker->address(),
                'sex' => $faker->randomElement(['F','M']),
            ]);
        }
    }
    
}
