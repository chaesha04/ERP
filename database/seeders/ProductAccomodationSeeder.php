<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductAccomodation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductAccomodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAccomodation::create([
            'hotel_name'=>'Tanjung Lesung Beach Hotel',
            'hotline'=> '081122334455',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>' '
        ]);
        ProductAccomodation::create([
            'hotel_name'=>'Ladda Bay Village',
            'hotline'=> '081122334455',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>' '
        ]);
        ProductAccomodation::create([
            'hotel_name'=>'Lalassa Beach Club',
            'hotline'=> '081122334455',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>' '
        ]);
        ProductAccomodation::create([
            'hotel_name'=>'Kalicaa Villa',
            'hotline'=> '081122334455',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>' '
        ]);
    }
}
