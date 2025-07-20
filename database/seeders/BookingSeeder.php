<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
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
            $checkIn = $faker->dateTimeBetween('2023-01-01', '2025-12-30');
            $checkOut = $faker->dateTimeBetween($checkIn->format('Y-m-d').' +1 day', '2025-12-31');

            Booking::create([
                'hotel_id' => $faker->randomDigitNotNull(),
                'rooms_id' => $faker->randomDigitNotNull(),
                'check_in' => $checkIn->format('d/m/Y'), // kalau mau dd/mm/yyyy
                'check_out' => $checkOut->format('d/m/Y'),
                'adults' => $faker->numberBetween(1, 6),
                'child' => $faker->numberBetween(0, 2),
                'total_night' => $faker->numberBetween(1, 10),
                'actual_price' => $faker->randomFloat(0, 500000, 3000000),
                'subtotal' => $faker->randomFloat(0, 500000, 5000000),
                'total_amount' => $faker->randomFloat(0, 500000, 5000000),
                'discount' => $faker->numberBetween(0, 555555555),
                'payment_method' => $faker->randomElement(['Bank', 'QRIS']),
                'payment_status' => $faker->randomElement(['unpaid', 'paid']),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'country' => $faker->country(),
                'code' => $faker->randomDigit(),
                'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
                'additional_request' => $faker->randomElement(['Honeymoon Adds On', '-']),
            ]);
        }
    }

}
