<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HotelDetail;
use App\Models\ProductAccomodation;

class HotelDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lbv = ProductAccomodation::where('hotel_name', 'Ladda Bay Village')->first();
        $lalassa = ProductAccomodation::where('hotel_name', 'Lalassa Beach Club')->first();

        if ($lbv) {
            HotelDetail::create([
                'hotel_name' => $lbv->id, // foreign key ke product_accomodations
                'room_type' => 'Viriya 1',
                'bedroom_qty' => 1,
                'unit' => 11,
                'extra_facility' => 'mini garden',
            ]);
            HotelDetail::create([
                'hotel_name' => $lbv->id, // foreign key ke product_accomodations
                'room_type' => 'Viriya 2',
                'bedroom_qty' => 2,
                'unit' => 13,
                'extra_facility' => 'mini garden',
            ]);
            HotelDetail::create([
                'hotel_name' => $lbv->id, // foreign key ke product_accomodations
                'room_type' => 'Tara',
                'bedroom_qty' => 1,
                'unit' => 25,
                'extra_facility' => 'mini garden',
            ]);
        } else {
            echo "Product Accomodation 'Ladda Bay Village' tidak ditemukan.\n";
        }

        if($lalassa){
            HotelDetail::create([
                'hotel_name' => $lalassa->id, // foreign key ke product_accomodations
                'room_type' => 'Container Inn',
                'bedroom_qty' => 1,
                'unit' => 10,
                'extra_facility' => ' ',
            ]);
        } else{
            echo "Product Accommodation 'Lalassa Beach Club' tidak ditermukan. \n";
        }
    }
}
