<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HotelDatabaseService;

class BeachTicketERPController extends Controller
{
    public function index(Request $request)
    {
        // Data ticket_orders (Hotel DB)
        $beachData = [];
        $beachError = null;

        try {
            $beachService = new HotelDatabaseService();
            $beachData = $beachService->getBeachTicketsFromDatabase();

            // Filtering by keyword langsung di array hasil query
            if ($request->filled('keyword')) {
                $keyword = strtolower($request->keyword);
                $field = $request->get('field', 'orders_code');

                $beachData = array_filter($beachData, function ($row) use ($field, $keyword) {
                    $value = strtolower($row[$field] ?? '');
                    return strpos($value, $keyword) !== false;
                });
            }
        } catch (\Exception $e) {
            $beachError = $e->getMessage();
        }

        return view('bnr_beach', [
            'title'      => 'Beach',
            'beachData'  => $beachData,
            'beachError' => $beachError,
        ]);
    }
}
