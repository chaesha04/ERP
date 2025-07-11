<?php

namespace Database\Seeders;

use App\Models\BreakdownBeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreakdownBeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BreakdownBeo::create([
            'product' => 'Lunch',
            'price' => 50000,
            'unit'=>50,
            'night' => 1,
            'total_price' => 2500000,
            'gb_id'=> 1
        ]);
        BreakdownBeo::create([
            'product' => 'Dinner',
            'price' => 100000,
            'unit'=>50,
            'night' => 1,
            'total_price' => 5000000,
            'gb_id'=> 1
        ]);

    }
}
