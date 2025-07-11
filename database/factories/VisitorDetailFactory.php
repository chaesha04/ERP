<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitorDetail>
 */
class VisitorDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'visitor_name'=>fake()->name(),
            'group_name'=>fake()->name(),
            'phone_number'=>fake()->phoneNumber(),
            'country'=>fake()->country(),
            'email'=>fake()->email(),
            'sex'=>fake()->randomElement(['Male','Female'])
        ];
    }
}
