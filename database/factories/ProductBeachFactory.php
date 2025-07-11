<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductBeach>
 */
class ProductBeachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'beach_name'=>fake()->sentence(),
            'location'=>fake()->address(),
            'hotline'=>fake()->phoneNumber(),
            'note'=>fake()->sentence(),
        ];
    }
}
