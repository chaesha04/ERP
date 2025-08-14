<?php

namespace Database\Seeders;

use App\Models\ProductActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductActivity::create([
            'watersport'=>'Jetski',
            'price'=>'100000',
            'note'=>'PT. Banten West Java',
            'unit'=>'5',
        ]);
        ProductActivity::create([
            'watersport'=>'Banana Boot',
            'price'=>'150000',
            'note'=>'PT. Banten West Java',
            'unit'=>'2',
        ]);
        ProductActivity::create([
            'watersport'=>'ATV',
            'price'=>'150000',
            'note'=>'PT. Banten West Java',
            'unit'=>'10',
        ]);
        ProductActivity::create([
            'watersport'=>'Paddle',
            'price'=>'100000',
            'note'=>'PT. Banten West Java',
            'unit'=>'5',
        ]);
        ProductActivity::create([
            'watersport'=>'Sea Kayak',
            'price'=>'100000',
            'note'=>'PT. Banten West Java',
            'unit'=>'4',
        ]);
    }
}
