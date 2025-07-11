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
            'note'=>'',
        ]);
    }
}
