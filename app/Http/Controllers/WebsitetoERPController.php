<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsitetoERPController extends Controller
{
        public function index(Request $request)
        {
            $query = DB::connection('hotelwebapp2')->table('bookings');

            if ($request->has('field') && $request->has('keyword')) {
                $field = $request->input('field');
                $keyword = $request->input('keyword');
                $query->where($field, 'LIKE', "%$keyword%");
            }

            $webBooking = $query->paginate(20); // <--- paginate dulu, jangan get()

            return view('bnr_accommodation', compact('webBooking'), [
                'title' => 'Accommodation | Website Order'
            ]);
        }
        public function detail($id){
            $seedetail = DB::connection('hotelwebapp2')->table('bookings')->where('id', $id)->first();

            if(!$seedetail){
                abort(404);
            };

            return view('bnr_accommodationdetail', compact('seedetail'),['title' => 'Accommodation | Website Detail']);
        }
}
