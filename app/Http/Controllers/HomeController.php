<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupBookingOrder;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function showCalendar()
    {
        $bookings = GroupBookingOrder::with('ProductDetail', 'VisitorDetail')
            ->select('id','group_id', 'check_in', 'check_out')
            ->get();

        $events = $bookings->map(function ($booking) {
            return [
                'title' => $booking->VisitorDetail->group_name ?? 'No Group Name',
                'start' => $booking->check_in,
                'end' => Carbon::parse($booking->check_out)->addDay()->toDateString(),
                'url' => url('/bookingandreservation/groupbookingorder/' . $booking->id),
            ];
        });

        return view('home', [
            'title' => 'Group Booking Calendar',
            'events' => $events,
        ]);
    }

    public function index(Request $request)
    {
        return auth()->guard('web')->user();
    }
}
