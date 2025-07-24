<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreakdownBeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $products = [
            'Welcome Drink',
            'Breakfast',
            'Breakfast Children',
            'Lunch',
            'Lunch Children',
            'Dinner',
            'Dinner Children',
        ];

        $fixedPrices = [50000, 100000, 150000, 250000];

        for ($gbId = 1; $gbId <= 50; $gbId++) {
            $usedProducts = $faker->randomElements($products, $faker->numberBetween(1, count($products)));

            foreach ($usedProducts as $product) {
                $price = $faker->randomElement($fixedPrices);    // pilih dari harga tetap
                $unit = $faker->numberBetween(10, 100);          // pax
                $night = $faker->numberBetween(1, 3);            // malam
                $total = $price * $unit * $night;

                DB::table('breakdown_beos')->insert([
                    'product' => $product,
                    'price' => $price,
                    'unit' => $unit,
                    'night' => $night,
                    'total_price' => $total,
                    'gb_id' => $gbId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
