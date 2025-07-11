<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupbookingOrder;

class SalesModuleController extends Controller
{
    public function showCalendar(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        $orders = GroupbookingOrder::whereMonth('check_in', $month)
            ->whereYear('check_in', $year)
            ->get();

        $events = [];
        foreach ($orders as $order) {
            $events[] = [
                'title' => 'Check-in: ' . $order->group_id,
                'start' => $order->check_in,
                'color' => 'green'
            ];
            $events[] = [
                'title' => 'Check-out: ' . $order->group_id,
                'start' => $order->check_out,
                'color' => 'red'
            ];
        }

        return view('salesmodule', [
            'events' => $events,
            'month' => $month,
            'year' => $year,
            'title' => 'Booking Calendar'
        ]);
    }

    public function showGroupBooking(){
        $title = 'Group Booking Summary';
        $hotel_id = 1;

        
    $orders = GroupbookingOrder::whereIn('hotel_id', [1, 2, 3, 4])->get();

    return view('salesmodule', compact('title', 'orders'));
    }
}
