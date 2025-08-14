<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\HotelDetail;
use App\Models\PackageGroupBooking;
use App\Models\ProductAccomodation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelDetail>
 */
class HotelDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $checkIn = Carbon::parse(fake()->dateTimeBetween('-1 year', 'now'));
        $checkOut = (clone $checkIn)->addDays(fake()->numberBetween(1, 31)); // max sebulan        
        $day = $checkIn->diffInDays($checkOut);
    
        return [
            'package_id'=> PackageGroupBooking::factory()->create(),
            'hotel_name' => $product = PackageGroupBooking::factory()->create(),
            'check_in' => $checkIn->toDateString(),
            'check_out' => $checkOut->toDateString(),
            'day' => $day,
            'discount' => $discount = fake()->randomElement([0, 10, 20, 30, 40, 50]),
            'qty' => $qty = fake()->numberBetween(1, 10),
            'price'=> $price = $product->price,
            'total'=> $total = $day * $price * $qty * (1 - ($discount / 100))
        ];
        
    }

}
