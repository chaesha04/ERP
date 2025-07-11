<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductMeetingRoom>
 */
class ProductMeetingRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'meetingroom_name'=>fake()->sentence(2),
            'location'=>fake()->address(),
            'hotline'=>fake()->phoneNumber(),
            'note'=>fake()->sentence()
        ];
    }
}
