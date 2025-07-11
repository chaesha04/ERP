<?php

namespace App\Http\Controllers;

use App\Models\HotelDetail;
use Illuminate\Http\Request;

class HotelDetailController extends Controller
{
        public function store(Request $request)
    {
        HotelDetail::create($request->all());
        return redirect('/product/accommodation')->with('success', 'Room Type added!');
    }

        public function destroy($id)
    {
        $hotelDetail = HotelDetail::findOrFail($id);
        $hotelDetail->delete();
    
        return response()->json(['message' => 'Deleted successfully']);
    }
    

}
