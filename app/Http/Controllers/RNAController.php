<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\GroupbookingOrder;
use App\Models\TicketOrder;
use Illuminate\Support\Facades\DB;

class RNAController extends Controller
{

    public function showRoomChart()
    {
        // --- PIE CHART: Room Type
        $totals = DB::table('groupbooking_orders')->selectRaw('
            SUM(single_room) as single,
            SUM(twin_room) as twin,
            SUM(triple_room) as triple,
            SUM(child_room) as child
        ')->first();

        $pieLabels = ['Single Room', 'Twin Room', 'Triple Room', 'Child Room'];
        $pieData = [
            $totals->single ?? 0,
            $totals->twin ?? 0,
            $totals->triple ?? 0,
            $totals->child ?? 0,
        ];

        // --- LINE CHART: Monthly Total Room Booking
        $monthlyBookings = DB::table('groupbooking_orders')
            ->selectRaw('DATE_FORMAT(check_in, "%Y-%m") as month, SUM(qty_room) as total_rooms')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $lineLabels = $monthlyBookings->pluck('month')->map(function ($item) {
            return Carbon::createFromFormat('Y-m', $item)->format('M Y');
        });

        $lineData = $monthlyBookings->pluck('total_rooms');

        
        $orders = GroupbookingOrder::with('ProductDetail')->get();
        $hotels = $orders->pluck('ProductDetail')->filter()->unique('id');
        
        $beachDatas = TicketOrder::all();
        $uniqueHotelIds = $beachDatas->pluck('beach_ticket_id')->unique()->filter();

        $beachData = TicketOrder::whereIn('id', $uniqueHotelIds)->get();

        // coba liat, di return itu yg di dalam petik buat di blade
        // misalkan disini 'title' berari di blade $title

        return view('rna', [
            'title' => 'Reporting and Analytics',
            'labels' => $pieLabels,
            'data' => $pieData,
            'lineLabels' => $lineLabels,
            'lineData' => $lineData,
            'hotels' => $hotels,
            'beachData' => $beachData
            
        ]);
    }
    
    public function showHotelDetail($id)
    {
        // Ambil satu data booking dengan relasi hotel, untuk ambil nama hotel
        $hotel = GroupbookingOrder::with('ProductDetail')
            ->where('hotel_id', $id)
            ->first();

        // Validasi jika tidak ada data
        if (!$hotel || !$hotel->ProductDetail) {
            abort(404, 'Hotel not found');
        }

        // Ambil semua booking yang terkait dengan hotel ini
        $hotelOrders = GroupbookingOrder::where('hotel_id', $id)->get();

        // Hitung total kamar dan total biaya berdasarkan tipe kamar
        $totalSingleRoom = $hotelOrders->sum('single_room');
        $totalSingleRoomCost = $hotelOrders->sum(function ($order) {
            return $order->single_room * $order->night * $order->singleroom_price;
        });

        $totalTwinRoom = $hotelOrders->sum('twin_room');
        $totalTwinRoomCost = $hotelOrders->sum(function ($order) {
            return $order->twin_room * $order->night * $order->twinroom_price;
        });

        $totalTripleRoom = $hotelOrders->sum('triple_room');
        $totalTripleRoomCost = $hotelOrders->sum(function ($order) {
            return $order->triple_room * $order->night * $order->tripleroom_price;
        });

        $totalChildRoom = $hotelOrders->sum('child_room');
        $totalChildRoomCost = $hotelOrders->sum(function ($order) {
            return $order->child_room * $order->night * $order->childroom_price;
        });

        $totalRoom = $totalSingleRoom + $totalTwinRoom + $totalTripleRoom + $totalChildRoom;
        $grandTotal = GroupbookingOrder::where('hotel_id', $id)->sum('grand_total');

        // Tambahan untuk Pie Chart
        $labels = ['Single Room', 'Twin Room', 'Triple Room', 'Child Room'];
        $data = [$totalSingleRoom, $totalTwinRoom, $totalTripleRoom, $totalChildRoom];

        return view('rna_hotel', [
            'title' => 'Hotel Room Detail',
            'hotel' => $hotel->ProductDetail,
            'orders' => $hotelOrders,
            'totalSingleRoom' => $totalSingleRoom,
            'totalSingleRoomCost' => $totalSingleRoomCost,
            'totalTwinRoom' => $totalTwinRoom,
            'totalTwinRoomCost' => $totalTwinRoomCost,
            'totalTripleRoom' => $totalTripleRoom,
            'totalTripleRoomCost' => $totalTripleRoomCost,
            'totalChildRoom' => $totalChildRoom,
            'totalChildRoomCost' => $totalChildRoomCost,
            'grandTotal' => $grandTotal,
            'totalRoom' => $totalRoom,
            'labels' => $labels,
            'data' => $data
        ]);
    }



}
