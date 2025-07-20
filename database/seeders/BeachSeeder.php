<?php

namespace Database\Seeders;

use App\Models\ProductBeach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBeach::create([
            'beach_name'=>'Ladda Beach',
            'hotline'=>'0252802900',
            'location'=>'Tanjung Lesung, Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'web_avail'=>'No',
            'price'=>'',
            'note'=>'PT. Banten West Java',
        ]);
        ProductBeach::create([
            'beach_name'=>'Lalassa Beach Club',
            'hotline'=>'08111580025',
            'location'=>'Tanjung Lesung, Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'web_avail'=>'Yes',
            'price'=>'45000',
            'note'=>'PT. Banten West Java',
        ]);
        ProductBeach::create([
            'beach_name'=>'Private Beach Kalicaa',
            'hotline'=>'0253802900',
            'location'=>'Kalicaa Villa Tanjung Lesung, Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'web_avail'=>'No',
            'price'=>'',
            'note'=>'PT. Banten West Java',
        ]);
        ProductBeach::create([
            'beach_name'=>'Bodur Beach',
            'hotline'=>'08111929005',
            'location'=>'Tanjung Lesung, Tanjung Jaya, Panimbang, Pandeglang, Banten',
            'web_avail'=>'Yes',
            'price'=>'50000',
            'note'=>'PT. Banten West Java',
        ]);
    }
}
