<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductActivity>
 */
class ProductActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'watersport'=>fake()->sentence(),
            'pax'=>fake()->randomNumber(2),
            'price'=>fake()->numberBetween(50000, 200000)

        ];
    }
}
