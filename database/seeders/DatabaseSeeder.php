<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Banqueteventorder;
use App\Models\GroupBookingDetail;
use App\Models\HotelDetail;
use App\Models\PackageGroupBooking;
use App\Models\ProductActivity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //employee seeder udh bisa diapus
        $this->call([
            ProductAccomodationSeeder::class, 
            VisitorDetailSeeder::class, 
            EmployeeSeeder::class, 
            BeachSeeder::class,
            MeetingroomSeeder::class,
            ProductActivitySeeder::class,
            GroupbookingOrderSeeder::class,
            BanqueteventorderSeeder::class,
            HotelDetailSeeder::class,
            EventBeoSeeder::class,
            BreakdownBeoSeeder::class,
            BookingSeeder::class,
            BeachTicketERPSeeder::class,
        ]);
    }
}
