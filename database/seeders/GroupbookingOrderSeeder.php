<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GroupbookingOrder;
use Illuminate\Support\Str;

class GroupBookingOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Harga tetap
        $singlePrice = 700000;
        $twinPrice = 650000;
        $triplePrice = 600000;

        for ($i = 0; $i < 50; $i++) {
            $checkIn = $faker->dateTimeBetween('+1 days', '+3 months');
            $night = $faker->numberBetween(1, 5);
            $checkOut = (clone $checkIn)->modify("+{$night} days");

            // Jumlah kamar
            $singleRoom = $faker->numberBetween(1, 5);
            $twinRoom = $faker->numberBetween(20, 50);
            $tripleRoom = $faker->numberBetween(20, 60);
            $childRoom = $faker->numberBetween(0, 20);
            $childPrice = $faker->randomElement([300000, 350000]);

            // Hitung total
            $grandTotal = (
                $singleRoom * $singlePrice +
                $twinRoom * $twinPrice +
                $tripleRoom * $triplePrice +
                $childRoom * $childPrice
            ) * $night;

            GroupbookingOrder::create([
                'slug' => Str::slug($faker->unique()->sentence(3) . '-' . $i),
                'check_in' => $checkIn->format('Y-m-d'),
                'check_out' => $checkOut->format('Y-m-d'),
                'event_type' => $faker->randomElement(['Wedding', 'Meeting', 'Training', 'Gathering']),
                'hotel_id' => $faker->numberBetween(1, 4),
                'qty_room' => $singleRoom + $twinRoom + $tripleRoom + $childRoom,
                'extrabed' => $faker->numberBetween(0, 10),
                'adult' => $faker->numberBetween(10, 100),
                'child' => $faker->numberBetween(0, 50),
                'baby' => $faker->numberBetween(0, 10),
                'night' => $night,
                'rate_desc' => $faker->randomElement(['Corporate Rate', 'Family Rate', 'Seasonal Rate']),
                'package' => $faker->randomElement(['Fullboard', 'Halfboard', 'Room Only']),
                'single_room' => $singleRoom,
                'twin_room' => $twinRoom,
                'triple_room' => $tripleRoom,
                'child_room' => $childRoom,
                'singleroom_price' => $singlePrice,
                'twinroom_price' => $twinPrice,
                'tripleroom_price' => $triplePrice,
                'childroom_price' => $childPrice,
                'grand_total' => $grandTotal,
                'deposit' => $faker->numberBetween(intval($grandTotal * 0.1), intval($grandTotal * 0.5)),
                'sales_id' => 1,
                'group_id' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
