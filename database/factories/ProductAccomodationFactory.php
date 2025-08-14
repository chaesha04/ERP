<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAccomodation>
 */
class ProductAccomodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hotel_name'=>fake()->sentence(3),
            'room_type'=>fake()->word(),
            'price'=>fake()->numberBetween(550000,8000000),
            'location'=>fake()->address(),
            'hotline'=>fake()->phoneNumber(),
            'note'=>fake()->sentence(1-10),
            'total_room'=>fake()->numberBetween(1,4),
            'total_unit'=>fake()->numberBetween(0,50),
            'extra_facility'=>fake()->randomElement(['Mini Garden', 'Private Pool'])
        ];
    }

}
