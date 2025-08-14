<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\VisitorDetail;
use App\Models\GroupbookingOrder;
use Illuminate\Support\Facades\DB;

class GroupbookingOrderController extends Controller
{
public function index(Request $request)
{
    //pake with karena data yg dipake kan bukan dari tablenya
    $query = GroupbookingOrder::with(['ProductDetail', 'VisitorDetail', 'SalesDetail']);

    if ($request->has('field') && $request->has('keyword')) {
        $field = $request->input('field');
        $keyword = $request->input('keyword');

        if ($field == 'hotel_name') {
            $query->whereHas('ProductDetail', function($q) use ($keyword) {
                $q->where('hotel_name', 'LIKE', "%$keyword%");
            });
        } elseif ($field == 'group_name') {
            $query->whereHas('VisitorDetail', function($q) use ($keyword) {
                $q->where('group_name', 'LIKE', "%$keyword%");
            });
        } elseif ($field == 'sales_name') {
            $query->whereHas('SalesDetail', function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%");
            });
        } elseif($field == 'slug'){
            $query->where('slug', $keyword);
        }
    }

    $groupbookings = $query->paginate(20);

    return view('groupbookingorder', compact('groupbookings'))->with('title', 'Group Booking List');
}




    public function show($id)
    {
        $groupbooking = GroupbookingOrder::where('id', $id)->first();

        if (!$groupbooking) {
            abort(404);
        }

        return view('groupbookingorder_detail', compact('groupbooking'));
    }

    public function show_visitor($id)
    {
        $groupbooking = GroupbookingOrder::where('id', $id)->first();

        if (!$groupbooking) {
            abort(404);
        }

        return view('gbo_visitordetail', compact('groupbooking'));
    }

    public function show_admission($id)
    {
        $groupbooking = GroupbookingOrder::where('id', $id)->first();

        if (!$groupbooking) {
            abort(404);
        }

        return view('gbo_admissiondetail', compact('groupbooking'));
    }


        // public function showSalesChart()
        // {
        //     // Data pie chart
        //     $labels = ['Deluxe', 'Standard', 'Suite', 'Single'];
        //     $data = [30, 50, 15, 5];

        //     // Data line chart
        //     $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
        //     $bookings = [10, 15, 9, 20, 25, 18, 30];

        //     return view('rna', compact('labels', 'data', 'months', 'bookings'))
        //         ->with('title', 'Booking Room Summary');
        // }

        public function destroy($id)
        {
            DB::transaction(function () use ($id) {
                $groupBooking = GroupBookingOrder::findOrFail($id);

                // Hapus visitor detail terkait
                $groupBooking->VisitorDetail()->delete();

                // Hapus group booking
                $groupBooking->delete();
            });

            return response()->json(['success' => true]);
        }
        public function editHotelDetail($id){
            $groupbooking = GroupbookingOrder::where('id', $id)->first();
            
            if (!$groupbooking) {
                abort(404);
            }
            
            return view('gb_edithoteldetail', compact('groupbooking'));    
        }
        public function updateHotelDetail(Request $request, $id)
        {
            $groupbooking = GroupbookingOrder::findOrFail($id);
            
            $groupbooking->update([
                'singleroom_price' => $request->singleroom_price,
                'single_room'      => $request->single_room,
                'twinroom_price'   => $request->twinroom_price,
                'twin_room'        => $request->twin_room,
                'tripleroom_price' => $request->tripleroom_price,
                'triple_room'      => $request->triple_room,
                'childroom_price'  => $request->childroom_price,
                'child_room'       => $request->child_room,
                'night'            => $request->night,
                'deposit'          => $request->deposit,
                'grand_total'      => $request->grand_total,
                'check_in'         => $request->check_in,
                'check_out'        => $request->check_out,
                'adult'        => $request->adult,
                'child'        => $request->child,
                'baby'        => $request->baby,
            ]);
            
            return redirect('/bookingandreservation/groupbookingorder/' . $id)->with('success', 'Hotel detail updated successfully.');
        }
        public function editVisitorDetail($id){
            $groupbooking = GroupbookingOrder::with('VisitorDetail')->findOrFail($id);
            return view('gb_editvisitordetail', compact('groupbooking')); 
        }
        public function updateVisitorDetail(Request $request, $id)
        {
            $groupbooking = GroupbookingOrder::with('VisitorDetail')->findOrFail($id);

            $request->validate([
                'visitor_name' => 'required|string',
                'phone_number' => 'nullable|string',
                'sex' => 'nullable|string',
                'email' => 'nullable|email',
                'group_name' => 'nullable|string',
                'company_number' => 'nullable|string',
                'country' => 'nullable|string',
                'group_address' => 'nullable|string',
            ]);

            $visitorDetail = $groupbooking->VisitorDetail;

            // Pastikan data visitor detail ada
            if (!$visitorDetail) {
                // Bisa buat baru kalau perlu
                $visitorDetail = new VisitorDetail();
                $visitorDetail->groupbooking_order_id = $groupbooking->id; // contoh foreign key
            }

            $visitorDetail->visitor_name = $request->visitor_name;
            $visitorDetail->phone_number = $request->phone_number;
            $visitorDetail->sex = $request->sex;
            $visitorDetail->email = $request->email;
            $visitorDetail->group_name = $request->group_name;
            $visitorDetail->company_number = $request->company_number;
            $visitorDetail->country = $request->country;
            $visitorDetail->group_address = $request->group_address;

            $visitorDetail->save();

            return redirect('/bookingandreservation/groupbookingorder/' . $id.'/visitordetail')
                ->with('success', 'Visitor detail updated successfully.');
        }

        public function GBOAddNote($id){
            $groupbooking = GroupbookingOrder::findOrFail($id);
            
            return view('gbo_requestBEO', compact('groupbooking'));
        }
        public function GboAddEvent($id){
            $groupbooking = GroupbookingOrder::where('id', $id)->first();
            
            if (!$groupbooking) {
                abort(404);
            }
            return view('gbo_addevent', compact('groupbooking'));            
        }
        public function GboAddBreakdown($id){
            $groupbooking = GroupbookingOrder::where('id', $id)->first();
            
            if (!$groupbooking) {
                abort(404);
            }
            return view('gbo_addbreakdown', compact('groupbooking'));            
        }
        
        public function GboAddNotes($id){
            $groupbooking = GroupbookingOrder::where('id', $id)->first();
            
            if (!$groupbooking) {
                abort(404);
            }
            return view('gbo_requestBEO', compact('groupbooking'));            
        }

        public function uploadDocument(Request $request, $id)
        {
            $request->validate([
                'document_type' => 'required|string',
                'document_file' => 'required|file|mimes:pdf,docx,jpg,png|max:2048',
            ]);

            $file = $request->file('document_file');
            $path = $file->store('groupbooking_documents','public');

            Document::create([
                'groupbooking_id' => $id,
                'document_type' => $request->document_type,
                'file_path' => $path,
            ]);

            return back()->with('success', 'Document uploaded successfully.');
        }


}
