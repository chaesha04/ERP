<?php

namespace Database\Seeders;

use App\Models\MeetingRoomDetail;
use App\Models\ProductMeetingRoom;
use App\Models\VenueDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductMeetingRoom::create([
            'meetingroom_name'=>'Bagang Meetingroom',
            'location'=>'Lalassa Beach Club',
            'hotline'=>'08111580025',
            'note'=>'PT. Banten West Java'
        ]);
        ProductMeetingRoom::create([
            'meetingroom_name'=>'Liwungan Meetingroom',
            'location'=>'Tanjung Lesung Beach Hotel',
            'hotline'=>'08111929005',
            'note'=>'PT. Banten West Java'
        ]);
        ProductMeetingRoom::create([
            'meetingroom_name'=>'Panaitan Meetingroom',
            'location'=>'Tanjung Lesung Beach Hotel',
            'hotline'=>'08111929005',
            'note'=>'PT. Banten West Java'
        ]);
    }
}
