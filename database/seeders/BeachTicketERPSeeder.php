<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeachTicketERPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('ticket_orders')->insert([
                'beach_ticket_id' => rand(1, 2), // hanya 1 atau 2
                'order_code' => 'TIX-' . strtoupper(Str::random(8)),
                'customer_name' => $faker->name(),
                'customer_email' => $faker->safeEmail(),
                'customer_phone' => $faker->phoneNumber(),
                'visit_date' => $faker->dateTimeBetween('+1 days', '+30 days')->format('Y-m-d'),
                'quantity' => rand(1, 5),
                'additional_request' => rand(0, 1) ? $faker->sentence() : null,
                'total_price' => rand(50000, 250000),
                'payment_method' => $faker->randomElement(['cash', 'credit_card', 'qris', 'transfer']),
                'payment_status' => $faker->randomElement(['pending', 'paid', 'expired', 'cancelled']),
                'transaction_id' => rand(0, 1) ? strtoupper(Str::random(12)) : null,
                'paid_at' => rand(0, 1) ? Carbon::now()->subDays(rand(0, 5)) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
