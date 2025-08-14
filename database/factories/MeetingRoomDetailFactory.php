<?php

namespace Database\Factories;

use App\Models\MeetingRoomDetail;
use App\Models\ProductMeetingRoom;
use App\Models\VisitorDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MeetingRoomDetail>
 */
class MeetingRoomDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'meetingroom_name'=> ProductMeetingRoom::factory(),
            'check_in'=>fake()->date(),
            'check_out'=>fake()->date(),
            'meetinroom_type'=>fake()->sentence(),
        ];
    }
}
