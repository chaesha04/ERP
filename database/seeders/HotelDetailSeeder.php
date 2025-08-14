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
        $tjbh = ProductAccomodation::where('hotel_name', 'Tanjung Lesung Beach Hotel')->first();
        $kv = ProductAccomodation::where('hotel_name', 'Kalicaa Villa')->first();

        if ($lbv) {
            HotelDetail::create([
                'accommodation_id' => $lbv->id, // foreign key ke product_accomodations
                'room_type' => 'Viriya 1',
                'bedroom_qty' => 1,
                'unit' => 11,
                'extra_facility' => 'mini garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $lbv->id, // foreign key ke product_accomodations
                'room_type' => 'Viriya 2',
                'bedroom_qty' => 2,
                'unit' => 13,
                'extra_facility' => 'mini garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $lbv->id, // foreign key ke product_accomodations
                'room_type' => 'Tara',
                'bedroom_qty' => 1,
                'unit' => 25,
                'extra_facility' => 'mini garden',
            ]);
        } else {
            echo "Product Accomodation 'Ladda Bay Village' can not be found.\n";
        }

        if($lalassa){
            HotelDetail::create([
                'accommodation_id' => $lalassa->id, // foreign key ke product_accomodations
                'room_type' => 'Container Inn',
                'bedroom_qty' => 1,
                'unit' => 10,
                'extra_facility' => 'Else',
            ]);
        } else{
            echo "Product Accommodation 'Lalassa Beach Club' can not be found. \n";
        }
        if($tjbh){
            HotelDetail::create([
                'accommodation_id' => $tjbh->id, // foreign key ke product_accomodations
                'room_type' => 'Zamrud Cottage',
                'bedroom_qty' => 1,
                'unit' => 15,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $tjbh->id, // foreign key ke product_accomodations
                'room_type' => 'Mutiara Cottage',
                'bedroom_qty' => 2,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $tjbh->id, // foreign key ke product_accomodations
                'room_type' => 'Berlian Cottage',
                'bedroom_qty' => 3,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
        } else{
            echo "Product Accommodation 'Tanjung Lesung Beach Hotel' can not be found. \n";
        }
        if($kv){
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Courtyard Pool',
                'bedroom_qty' => 1,
                'unit' => 15,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Courtyard Pool 2',
                'bedroom_qty' => 2,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Fiji 2 Pool',
                'bedroom_qty' => 2,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Fiji 3 Pool',
                'bedroom_qty' => 3,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Bora 2 Pool',
                'bedroom_qty' => 2,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Bora 3 Pool',
                'bedroom_qty' => 3,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
            HotelDetail::create([
                'accommodation_id' => $kv->id,
                'room_type' => 'Villa Bora 3 No Pool',
                'bedroom_qty' => 3,
                'unit' => 20,
                'extra_facility' => 'Mini Garden',
            ]);
        } else{
            echo "Product Accommodation 'Tanjung Lesung Beach Hotel' can not be found. \n";
        }
    }
}
