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
            'hotline'=> '08111929005',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>'PT. Banten West Java'
        ]);
        ProductAccomodation::create([
            'hotel_name'=>'Ladda Bay Village',
            'hotline'=> '0252802900',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>'PT. Banten West Java'
        ]);
        ProductAccomodation::create([
            'hotel_name'=>'Lalassa Beach Club',
            'hotline'=> '08111580025',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>'PT. Banten West Java'
        ]);
        ProductAccomodation::create([
            'hotel_name'=>'Kalicaa Villa',
            'hotline'=> '0253802900',
            'location'=>'Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'note'=>'PT. Banten West Java'
        ]);
    }
}
