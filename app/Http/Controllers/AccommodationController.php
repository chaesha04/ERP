<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HotelDatabaseService;
use App\Models\ProductAccomodation;
use Exception;

class AccommodationController extends Controller
{
    public function index(Request $request)
    {
        // Data ERP yang sudah ada
        $webBooking = ProductAccomodation::query();
        
        if ($request->has('keyword') && $request->keyword) {
            $field = $request->get('field', 'code');
            $webBooking->where($field, 'like', '%' . $request->keyword . '%');
        }
        
        $webBooking = $webBooking->paginate(10);

        // DEBUG: Test koneksi hotel database
        $hotelData = [];
        $hotelError = null;
        
        try {
            // Test basic connection
            $hotelService = new HotelDatabaseService();
            
            // Debug: test simple query first
            $testQuery = new \mysqli('192.168.1.17', 'erp_user', 'U*s.MlxJH@]6qh1r', 'hotels');
            
            if ($testQuery->connect_error) {
                throw new Exception("Basic connection failed: " . $testQuery->connect_error);
            }
            
            // Test simple select
            $result = $testQuery->query("SELECT COUNT(*) as total FROM bookings");
            $count = $result->fetch_assoc();
            
            \Log::info('Total bookings in hotel DB: ' . $count['total']);
            
            // Test our service
            $hotelData = $hotelService->getBookingsForAccommodation();
            
            \Log::info('Hotel data retrieved: ' . count($hotelData));
            \Log::info('Sample data: ' . json_encode(array_slice($hotelData, 0, 2)));
            
            $testQuery->close();
            
        } catch (Exception $e) {
            $hotelError = $e->getMessage();
            \Log::error('Hotel DB Error: ' . $hotelError);
        }

        return view('bnr_accommodation', [
            'title' => 'Accommodation',
            'webBooking' => $webBooking,
            'hotelData' => $hotelData,
            'hotelError' => $hotelError
        ]);
    }

    public function show($id)
    {
        $hotelError = null;
        $seedetail = null;

        try {
            $hotelService = new HotelDatabaseService();
            $seedetail = $hotelService->getBookingDetails($id);
        } catch (Exception $e) {
            $hotelError = $e->getMessage();
        }

        if (!$seedetail) {
            return redirect('/bookingandreservation/accommodation')
                ->with('error', 'Booking not found in hotel database');
        }

        return view('bnr_accommodationdetail', [
            'title' => 'Booking Detail',
            'seedetail' => (object) $seedetail, // biar bisa diakses pakai $seedetail->field
            'hotelError' => $hotelError
        ]);
    }
    public function indexTicket(Request $request)
    {
        // Hotel TICKET ORDERS data only
        $hotelTickets = [];
        $ticketStats = [];
        $hotelError = null;
        
        try {
            $hotelService = new HotelDatabaseService();
            $hotelTickets = $hotelService->getBeachTicketsfromDatabase();
            
            // Filter by search if provided
            if ($request->has('keyword') && $request->keyword) {
                $keyword = strtolower($request->keyword);
                $field = $request->get('field', 'order_code');
                
                $hotelTickets = array_filter($hotelTickets, function($ticket) use ($field, $keyword) {
                    $value = strtolower($ticket[$field] ?? '');
                    return strpos($value, $keyword) !== false;
                });
            }
            
            if ($request->has('debug')) {
                return response()->json([
                    'tickets_count' => count($hotelTickets),
                    'stats' => $ticketStats,
                    'sample_ticket' => $hotelTickets[0] ?? null
                ]);
            }
            
        } catch (Exception $e) {
            $hotelError = $e->getMessage();
        }

        return view('bnr_beach', [
            'title' => 'Ticket Orders',
            'hotelTickets' => $hotelTickets,
            'ticketStats' => $ticketStats,
            'hotelError' => $hotelError
        ]);
    }

    public function showTicket($id)
    {
        try {
            $hotelService = new HotelDatabaseService();
            $ticketData = $hotelService->getTicketOrderDetails($id);
            
            return view('bnr_beach', [
                'ticket' => $ticketData
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'Cannot fetch ticket details: ' . $e->getMessage());
        }
    }
}