<?php

use App\Models\Vendor;
use App\Models\Document;
use App\Models\Employee;
use App\Models\pnpProcess;
use App\Models\ProductTrip;
use App\Models\VenueDetail;
use App\Models\ProductBeach;
use Illuminate\Http\Request;
use App\Models\VisitorDetail;
use App\Models\ProductActivity;
use App\Models\GroupbookingOrder;
use App\Models\GroupBookingDetail;
use App\Models\ProductMeetingRoom;
use Illuminate\Support\Facades\DB;
use App\Models\ProductAccomodation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RNAController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BanqueteventorderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeachController;
use Database\Factories\PnpProcessFactory;
use App\Http\Controllers\OfferingLetterPDF;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventBeoController;
use App\Http\Controllers\GuaranteeLetterPDF;
use App\Http\Controllers\BanquetEventOrderPDF;
use App\Http\Controllers\BeachTicketERPController;
use App\Http\Controllers\PnpProcessController;
use App\Http\Controllers\ConfirmationLetterPDF;
use App\Http\Controllers\HotelDetailController;
use App\Http\Controllers\SalesModuleController;
use App\Http\Controllers\BreakdownBeoController;
use App\Http\Controllers\ProductBeachController;
use App\Http\Controllers\WebsitetoERPController;
use App\Http\Controllers\VisitorDetailController;
use App\Http\Controllers\ProductActivityController;
use App\Http\Controllers\GroupbookingOrderController;
use App\Http\Controllers\GroupBookingDetailController;
use App\Http\Controllers\ProductMeetingRoomController;
use App\Http\Controllers\ProductAccomodationController; 
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StatusFrontOfficeController;
use App\Http\Middleware\RoleAccessMiddleware;
use App\Models\Banqueteventorder;
use App\Models\HotelDetail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'authenticating']);
Route::get('/logout',[AuthController::class, 'logout']);

// Route akses ditolak
Route::get('/access-denied', function () {
    return view('access-denied'); // resources/views/access-denied.blade.php
})->name('access.denied');


Route::middleware(['auth:employee'])->group(function () {
    
    Route::get('/', [HomeController::class, 'showCalendar']);
    
    // ✅ Hanya role: Sales Admin yang boleh akses modul sales
    Route::middleware('role.access:Sales Admin')->group(function () {

        // Jika ingin membatasi akses ini hanya untuk Sales Admin juga:
        Route::get('/salesmodule', [SalesModuleController::class, 'showGroupBooking', 'showCalendar']);
    });
    
    
    Route::get('/reportingandanalytics', [RNAController::class, 'showRoomChart']);
    Route::get('/reportingandanalytics/hotel_detail/{id}', [RNAController::class, 'showHotelDetail']);
    // Route::get('/reportingandanalytics', [GroupbookingOrderController::class, 'showRoomChart']);
    
    
    
    // Route::get('/bookingandreservation/accommodation', function () {
    //         try {
    //             $orders = DB::connection('bookingengine')->table('orders')->get();

    //             if ($orders->isEmpty()) {
    //                 return '✅ Terkoneksi ke `orders` di `hotelwebapp`, tapi datanya kosong.';
    //             }

    //             return $orders;
    //         } catch (\Exception $e) {
    //             return '❌ Error: ' . $e->getMessage();
    //         }
    //     });


    Route::get('/bookingandreservation/accommodation', [WebsitetoERPController::class, 'index'])->name('websitetoerp.index');
    Route::get('/bookingandreservation/accommodation/{id}', [WebsitetoERPController::class, 'detail'])->name('websitetoerp.detail');
    Route::post('/bookingandreservation/accommodation/statusfrontoffice/store', [StatusFrontOfficeController::class, 'store']);

    Route::get('/bookingandreservation/beach', [BeachTicketERPController::class, 'index'])->name('BeachTicketERP.index');
    Route::get('/bookingandreservation/beach/{order_code}', [BeachTicketERPController::class, 'detail'])->name('BeachTicketERP.detail');

    Route::get('/visitor', [VisitorDetailController::class, 'index'])->name('visitor.index');




    Route::get('/bookingandreservation/groupbookingorder/{id}/add_note', function($id){
        $groupbooking = GroupbookingOrder::with('NoteBEO')->findOrFail($id);

        return view('gbo_requestBEO', [
            'groupbooking' => $groupbooking,
            'noteBEO' => $groupbooking->NoteBEO,
            'title' => 'Group Booking | Booking and Reservation'
        ]);
    });

    Route::post('/bookingandreservation/groupbookingorder/{id}/add_note', [BanqueteventorderController::class,'store']);


    Route::get('/bookingandreservation/groupbookingorder/{id}/add_event', [GroupBookingOrderController::class, 'GboAddEvent']);
    Route::post('/eventbeo/store/{id}', [EventBeoController::class, 'store'])->name('eventbeo.store');
    Route::delete('/eventbeo/{id}', [EventBeoController::class, 'destroy'])->name('eventbeo.destroy');

    Route::get('/bookingandreservation/groupbookingorder/{id}/add_breakdown', [GroupBookingOrderController::class, 'GboAddBreakdown']);
    Route::post('/breakdown/store/{id}', [BreakdownBeoController::class, 'store'])->name('breakdownbeo.store');
    Route::delete('/breakdown/{id}', [BreakdownBeoController::class, 'destroy'])->name('breakdownbeo.destroy');

    Route::get('/bookingandreservation/groupbookingorder/{id}/add_breakdown', [GroupBookingOrderController::class, 'GboAddBreakdown']);
    Route::get('/groupbooking/pdf/{id}', [ConfirmationLetterPDF::class, 'show'])->name('generate-pdf');

    Route::get('/groupbooking/pdf/offeringletter/{id}', [OfferingLetterPDF::class, 'show'])->name('generate-offeringletter');

    Route::get('/groupbooking/pdf/banqueteventorder/{id}', [BanquetEventOrderPDF::class, 'show'])->name('generate-beo');

    Route::get('/groupbooking/pdf/guaranteeletter/{id}', [GuaranteeLetterPDF::class, 'show'])->name('generate-guaranteeletter');

    Route::get('/bookingandreservation/groupbookingorder', [GroupbookingOrderController::class, 'index'])->name('groupbookingorder.index');


    Route::delete('/bookingandreservation/groupbookingorder/{id}', [GroupBookingOrderController::class, 'destroy'])->name('destroy');


    Route::get('/bookingandreservation/groupbookingorder/{id}/edit', [GroupbookingOrderController::class, 'editHotelDetail']);
    Route::put('/bookingandreservation/groupbookingorder/{id}/edit', [GroupbookingOrderController::class, 'updateHotelDetail']);

    Route::get('/bookingandreservation/groupbookingorder/{id}/visitoredit', [GroupbookingOrderController::class, 'editVisitorDetail']);
    Route::put('/bookingandreservation/groupbookingorder/{id}/visitoredit', [GroupbookingOrderController::class, 'updateVisitorDetail']);

    Route::get('/bookingandreservation/groupbookingorder/{id}', [GroupbookingOrderController::class, 'show']);
    Route::get('/bookingandreservation/groupbookingorder/{id}/visitordetail', [GroupbookingOrderController::class, 'show_visitor']);
    Route::get('/bookingandreservation/groupbookingorder/{id}/admissiondetail', [GroupbookingOrderController::class, 'show_admission']);

    Route::post('/groupbookingorder/{id}/upload-document', [GroupbookingOrderController::class, 'uploadDocument'])->name('groupbookingorder.uploadDocument');


    // Step 1: Form untuk input visitor detail
    Route::get('/bookingandreservation/addnew_groupbooking/step1', function () {
        $groupbookings = GroupbookingOrder::all();
        return view('gb_addvisitordetail',compact('groupbookings'), ['title' => 'Group Booking | Booking and Reservation']);
    });

    Route::post('/groupbooking/step1', function (Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'visitor_name' => 'required',
            'group_name' => 'required',
            'company_number' => '',
            'phone_number' => 'required',
            'country' => 'required',
            'email' => '',
            'group_address' => 'required',
            'sex' => 'required',
        ]);
        
        $visitor = VisitorDetail::create($validated);
        
        return redirect('/groupbooking/step2/' . $visitor->id);
    });



    // Step 2: Form untuk input hotel detail
    Route::get('/groupbooking/step2/{visitor_id}', function ($visitor_id) {
        $visitor = VisitorDetail::findOrFail($visitor_id);
        $hotels = ProductAccomodation::all(); // ambil semua hotel
        $sales_id = Employee::where('role','Sales Admin')->get(); // ambil semua hotel
        
        return view('gb_addnew', [
            'visitor' => $visitor,
            'hotels' => $hotels,
            'sales_id' => $sales_id
        ]);
    });

    Route::post('/groupbooking/step2', function (Request $request) {
        $validated = $request->validate([
            'visitor_id' => 'required|exists:visitor_details,id',
            'hotel_id' => 'required|exists:product_accomodations,id',
            'sales_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'event_type' => 'required|string',
            'qty_room' => 'required|integer|min:0',
            'extrabed' => 'nullable|integer|min:0',
            'adult' => 'required|integer|min:0',
            'child' => 'required|integer|min:0',
            'baby' => 'nullable|integer|min:0',
            'night' => 'required|integer|min:1',
            'rate_desc' => 'nullable|string',
            'package' => 'nullable|string',
            'single_room' => 'nullable|integer|min:0',
            'twin_room' => 'nullable|integer|min:0',
            'triple_room' => 'nullable|integer|min:0',
            'child_room' => 'nullable|integer|min:0',
            'singleroom_price' => 'nullable|integer|min:0',
            'twinroom_price' => 'nullable|integer|min:0',
            'tripleroom_price' => 'nullable|integer|min:0',
            'childroom_price' => 'nullable|integer|min:0',
            'deposit' => 'nullable|integer|min:0',
            'grand_total' => 'nullable|integer|min:0',
        ]);

        // Mapping ke kolom yang sesuai di DB
        GroupBookingOrder::create([
            'group_id' => $validated['visitor_id'], // Disimpan sebagai FK ke visitor
            'hotel_id' => $validated['hotel_id'],
            'sales_id' => $validated['sales_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'event_type' => $validated['event_type'],
            'qty_room' => $validated['qty_room'],
            'extrabed' => $validated['extrabed'] ?? 0,
            'adult' => $validated['adult'],
            'child' => $validated['child'],
            'baby' => $validated['baby'] ?? 0,
            'night' => $validated['night'],
            'rate_desc' => $validated['rate_desc'] ?? '',
            'package' => $validated['package'] ?? '',
            'single_room' => $validated['single_room'] ?? 0,
            'twin_room' => $validated['twin_room'] ?? 0,
            'triple_room' => $validated['triple_room'] ?? 0,
            'child_room' => $validated['child_room'] ?? 0,
            'singleroom_price' => $validated['singleroom_price'] ?? 0,
            'twinroom_price' => $validated['twinroom_price'] ?? 0,
            'tripleroom_price' => $validated['tripleroom_price'] ?? 0,
            'childroom_price' => $validated['childroom_price'] ?? 0,
            'deposit' => $validated['deposit'] ?? 0,
            'grand_total' => $validated['grand_total'] ?? 0,
        ]);
        
        return redirect('/bookingandreservation/groupbookingorder')->with('success', 'Group booking berhasil disimpan!');

        
    });
        
    
    // inventory
    Route::middleware(['auth:employee', 'role.access:Inventory Admin'])->group(function () {
    Route::get('/product/accommodation', function () {
    $accomodations = ProductAccomodation::all(); // ambil data
    return view('accommodation', compact('accomodations' ),['title' => 'Product | Accomodation']);
    });

    Route::get('/product/accommodation/addnew', function () {
        $accommodation = ProductAccomodation::all();
        return view('addnewaccom', compact('accommodation' ),['title' => 'Product | Beach: Add New']); // kirim ke blade
    });
    Route::post('/product/accommodation/addnew', function (Request $request) {
        $validated = $request->validate([
            // 'accommodation_id' => 'required|max:255',
            'hotel_name' => 'required|max:255',
            'location' => 'required|max:255',
            'hotline' => 'required|max:255',
            'note' => 'max:255',
        ]);

        ProductAccomodation::create([
            // 'accommodation_id' => $request->accommodation_id,
            'hotel_name' => $request->hotel_name,
            'location' => $request->location,
            'hotline' => $request->hotline,
            'note' => $request->note,
        ]);

        return redirect('/product/accommodation')->with('success', 'Product added successfully');

    });
    Route::get('/product/accommodation/{id}', function ($id) {
        $accomodation = ProductAccomodation::with('hotelDetails')->findOrFail($id);
        $hotelDetails = $accomodation->hotelDetails;
        return view('accommodationdetail', compact('accomodation', 'hotelDetails'), [
            'title' => 'Product | Accomodation: ' . $accomodation->hotel_name
        ]);
    });
    Route::delete('/product/accommodation/{id}', [ProductAccomodationController::class, 'destroy']);
    Route::get('/product/accommodation/{id}/edit', [ProductAccomodationController::class, 'edit']);
    Route::put('/product/accommodation/{id}/edit', [ProductAccomodationController::class, 'update']);


    Route::get('/product/accommodation/{id}/addnew_roomtype', [ProductAccomodationController::class, 'createRoomType']);
    Route::post('/product/accommodation/{id}/addnew_roomtype', [HotelDetailController::class, 'store']);

    Route::get('/product/accommodation/{room_type}', [ProductAccomodationController::class, 'show']);

    Route::get('/product/accommodation/hoteldetail/{id}/edit', [HotelDetailController::class, 'edit']);
    Route::put('/product/accommodation/hoteldetail/{id}/edit', [HotelDetailController::class, 'update']);
    Route::put('/product/accommodation/hoteldetail/{id}/edit', [HotelDetailController::class, 'update']);
    Route::delete('/product/accommodation/hoteldetail/{id}/delete', [HotelDetailController::class, 'destroy']);

    Route::get('/product/beach', function () {
        $beaches = ProductBeach::all(); // ambil data
        return view('beach', compact('beaches' ),['title' => 'Product | Beach']); // kirim ke blade
    });
    Route::get('/product/beach/addnew', function () {
        $beaches = ProductBeach::all(); // ambil data
        return view('addnewbeach', compact('beaches' ),['title' => 'Product | Beach: Add New']); // kirim ke blade
    });


    Route::delete('/product/beach/{id}/delete', [ProductBeachController::class, 'destroy']);
    Route::get('/product/beach/{id}/edit', [ProductBeachController::class, 'edit']);
    Route::put('/product/beach/{id}/edit', [ProductBeachController::class, 'update']);

    Route::post('/product/beach/addnew', function (Request $request) {
        $validated = $request->validate([
            'beach_name' => 'required|max:255',
        'location' => 'required|max:255',
        'hotline' => 'required|max:255',
        'web_avail' => 'required|max:255',
        'price' => 'required|max:255',
        'note' => 'max:255',
    ]);

    ProductBeach::create([
        'beach_name' => $request->beach_name,
        'location' => $request->location,
        'hotline' => $request->hotline,
        'web_avail' => $request->web_avail,
        'price' => $request->price,
        'note' => $request->note,
    ]);

    return redirect('/product/beach')->with('success', 'Employee added successfully');

    });

    Route::get('/product/beach/{beach_name}', [ProductBeachController::class, 'show']);

    Route::get('/product/meetingroom', function () {
        $meetingrooms = ProductMeetingRoom::all(); // ambil data
        return view('meetingroom', compact('meetingrooms' ),['title' => 'Product | Meeting Room']); // kirim ke blade
    });

    // Route::get('/product/meetingroom/{meetingroom_name}', [ProductMeetingRoomController::class, 'show']);

    Route::get('/product/meetingroom/{id}/edit', [ProductMeetingRoomController::class, 'edit']);
    Route::put('/product/meetingroom/{id}/edit', [ProductMeetingRoomController::class, 'update']);
    Route::delete('/product/meetingroom/{id}/delete', [ProductMeetingRoomController::class, 'destroy']);

    Route::get('/product/addnew_meetingroom', function () {
        $meetingroom = ProductMeetingRoom::all(); // ambil data
        return view('addnewmeetingroom', compact('meetingroom' ),['title' => 'Product | Meeting Room: Add New']); // kirim ke blade
    });


    Route::post('/product/addnew_meetingroom', function (Request $request) {
        $validated = $request->validate([
            'meetingroom_name' => 'required|max:255',
            'location' => 'required|max:255',
            'hotline' => 'required|max:255',
            'note' => 'required',
        ]);
        
        ProductMeetingRoom::create([
            'meetingroom_name' => $request->meetingroom_name,
            'location' => $request->location,
            'hotline' => $request->hotline,
            'note' => $request->note,
        ]);

        return redirect('/product/meetingroom')->with('success', 'Employee added successfully');
    });


    Route::get('/product/watersport', function () {
        $activities = ProductActivity::all(); // ambil data
        return view('watersport', compact('activities' ),mergeData: ['title' => 'Product | Watersport']); // kirim ke blade
    });
    Route::get('/product/watersport/{id}/edit', [ProductActivityController::class, 'edit']);
    Route::put('/product/watersport/{id}/edit', [ProductActivityController::class, 'update']);
    Route::delete('/product/watersport/{id}', [ProductActivityController::class, 'destroy']);

    Route::get('/product/addnew_activities', function () {
        return view('addnewwatersport', ['title' => 'Product | Activities : Add New']);
    });

    Route::post('/product/addnew_activities', function (Request $request) {
        $validated = $request->validate([
            'watersport' => 'required|max:255',
            'price' => 'required|max:255',
            'note' => 'required',
            'unit' => 'required',
        ]);

        ProductActivity::create([
            'watersport' => $request->watersport,
            'price' => $request->price,
            'note' => $request->note,
            'unit' => $request->unit,
        ]);

        return redirect('/product/watersport')->with('success', 'Employee added successfully');
    });


    // Settings
    Route::middleware(['auth:employee'])->group(function () {
    // Settings Profile Page
    Route::get('/settings', function () {
        return view('settings', ['title' => 'Settings']);
    });

    // Control Access Page - hanya bisa diakses oleh Super Admin
    Route::middleware(['role.access:Super Admin'])->group(function () {
        Route::get('/controlaccess', [SettingController::class, 'controlAccess'])->name('controlaccess');

    Route::get('/controlaccess', function () {
        $controlaccess = Employee::all();
        return view('controlaccess', compact('controlaccess'), ['title' => 'Control Access']);
    });

    Route::get('/controlaccess/{employee}', [EmployeeController::class, 'show']);
    Route::delete('/controlaccess/{employee}', [EmployeeController::class, 'destroy']);
    Route::get('/addnew/controlaccess', function () {
        return view('addnew_controlaccess', ['title' => 'Add Control Access']);
    });
    Route::get('/controlaccess/{id}/edit', [EmployeeController::class, 'edit']);
    Route::put('/controlaccess/{id}', [EmployeeController::class, 'update']);

    Route::post('/addnew/controlaccess', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'division' => 'required|max:255',
            'email' => 'required|email|unique:employees,email',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        Employee::create([
            'name' => $request->name,
            'division' => $request->division,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/controlaccess')->with('success', 'Employee added successfully');
    });

});
    });
    });
});