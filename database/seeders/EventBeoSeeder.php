<?php

namespace Database\Seeders;

use App\Models\EventBeo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventBeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventBeo::create([
            'date' => '2025-05-27',
            'start' => '18:00',
            'end' => '19:00',
            'activities' => 'test',
            'place' => 'lalassa',
            'gb_id' => '1',
        ]);

        EventBeo::create([
            'date' => '2025-05-28',
            'start' => '18:00',
            'end' => '19:00',
            'activities' => 'test',
            'place' => 'lalassa',
            'gb_id' => '1',
        ]);

    }
}
