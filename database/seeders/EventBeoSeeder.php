<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBeo;
use App\Models\GroupbookingOrder;

class EventBeoSeeder extends Seeder
{
    public function run(): void
    {
        $meetingRooms = ['Panaitan Meeting Room', 'Bagang Meeting Room', 'Liwungan Meeting Room'];
        $activityPlaces = ['Lalassa'];
        $diningPlaces = ['Pangarango', 'Krakatau Bar'];
        $activities = ['Check In', 'Check Out', 'Group Team Activity', 'Ice Breaking', 'Meeting', 'Breakfast', 'Lunch', 'Dinner'];

        foreach (GroupbookingOrder::limit(50)->get() as $group) {
            $period = \Carbon\CarbonPeriod::create($group->check_in, $group->check_out);
            foreach ($period as $date) {
                $dateStr = $date->toDateString();

                $eventCount = rand(2, 4); // biar variasi
                for ($i = 0; $i < $eventCount; $i++) {
                    $activity = $activities[array_rand($activities)];

                    // Tempat disesuaikan dengan aktivitas
                    switch ($activity) {
                        case 'Meeting':
                            $place = $meetingRooms[array_rand($meetingRooms)];
                            $start = '09:00';
                            $end = '11:00';
                            break;
                        case 'Breakfast':
                            $place = $diningPlaces[array_rand($diningPlaces)];
                            $start = '07:00';
                            $end = '08:00';
                            break;
                        case 'Lunch':
                            $place = $diningPlaces[array_rand($diningPlaces)];
                            $start = '12:00';
                            $end = '13:00';
                            break;
                        case 'Dinner':
                            $place = $diningPlaces[array_rand($diningPlaces)];
                            $start = '18:00';
                            $end = '19:00';
                            break;
                        case 'Check In':
                            $place = 'Lobby';
                            $start = '14:00';
                            $end = '15:00';
                            break;
                        case 'Check Out':
                            $place = 'Lobby';
                            $start = '11:00';
                            $end = '12:00';
                            break;
                        default:
                            $place = $activityPlaces[array_rand($activityPlaces)];
                            $start = '15:00';
                            $end = '17:00';
                            break;
                    }

                    EventBeo::create([
                        'date' => $dateStr,
                        'start' => $start,
                        'end' => $end,
                        'activities' => $activity,
                        'place' => $place,
                        'gb_id' => $group->id,
                    ]);
                }
            }
        }
    }
}
