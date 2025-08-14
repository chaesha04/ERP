<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanquetEventOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $note_housekeeping = "Mohon diperhatikan mengenai kebersihan area Hotel, # Mohon dibantu diarahkan ke Pangrango resto pada saat kedatangan";
        $note_engineer     = "Mohon diperhatikan mengenai kebersihan area Hotel";
        $note_accounting   = "Mohon dibantu dibuatkan Invoice sesuai penggunaan";
        $note_kitchen      = "Mohon disiapkan 1x Breakfast, 1x Lunch & 1x Dinner";
        $note_sport        = "Mohon dibantu diarahkan ke Lalassa Beach Club untuk kegiatan Watersport";
        $note_fnb          = "Mohon disiapkan 1x Breakfast, 1x Lunch & 1x Dinner";
        $lalassaOptions    = [
            "Kegiatan Watersport di charge @90.000/Voucher",
            "Kegiatan Watersport di charge @150.000/Voucher",
            ""
        ];

        for ($gbId = 1; $gbId <= 50; $gbId++) {
            DB::table('banqueteventorders')->insert([
                'note_housekeeping' => $note_housekeeping,
                'note_engineer'     => $note_engineer,
                'note_accounting'   => $note_accounting,
                'note_kitchen'      => $note_kitchen,
                'note_sport'        => $note_sport,
                'note_fnb'          => $note_fnb,
                'note_lalassa'      => $faker->randomElement($lalassaOptions),
                'gb_id'             => $gbId,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
