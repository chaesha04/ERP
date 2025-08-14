<?php

namespace App\Http\Controllers;

use App\Models\HotelDetail;
use Illuminate\Http\Request;

class HotelDetailController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'accommodation_id' => 'required|exists:product_accomodations,id',
            'room_type' => 'required|max:255',
            'bedroom_qty' => 'required|numeric',
            'unit' => 'required|numeric',
            'extra_facility' => 'nullable|string|max:255',
        ]);

        HotelDetail::create($validated);

        return redirect('/product/accommodation')->with('success', 'Room Type added!');
    }


        public function destroy($id)
    {
        $hotelDetail = HotelDetail::findOrFail($id);
        $hotelDetail->delete();
    
        return response()->json(['message' => 'Deleted successfully']);
    }

        public function edit($id)
        {
            $room = HotelDetail::findOrFail($id);
            return view('accommodationdetail_hoteldetailedit', compact('room'));
        }

        public function update(Request $request, $id){
            $room = HotelDetail::findOrFail($id);

            if ($request->has('room_type')){
                $room->room_type = $request->room_type;
            }
            if ($request->has('bedroom_qty')){
                $room->bedroom_qty = $request->bedroom_qty;
            }
            if ($request->has('unit')){
                $room->unit = $request->unit;
            }
            if ($request->has('extra_facility')){
                $room->extra_facility = $request->extra_facility;
            }

            $room->save();

            return redirect('product/accommodation')->with('success', 'Product Room Type in Selected Accommodation updated successfully!');
        }

}
