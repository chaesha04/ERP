<?php

namespace App\Http\Controllers;

use App\Models\ProductMeetingRoom;
use Illuminate\Http\Request;

class ProductMeetingRoomController extends Controller
{
    public function index(){
        $meetingrooms = ProductMeetingRoom::all();
        return view('meetingroom.index', compact('meetingrooms'));
    }
    public function show($meetingroom_name)
    {
        $meetingroom = ProductMeetingRoom::where('meetingroom_name', $meetingroom_name)->first();

        if (!$meetingroom) {
            abort(404);
        }

        return view('meetingroomdetail', compact('meetingroom'));
    }

        public function destroy($id)
    {
        $meetingroom = ProductMeetingRoom::findOrFail($id);
        $meetingroom->forceDelete();

        return response()->json(['message'=>'Product Meeting Room deleted successfully.'], 200);
    }

        public function edit($id)
    {
        $meetingroom = ProductMeetingRoom::findorFail($id);
        return view('meetingroomdetailedit', compact('meetingroom'));
    }

        public function update(Request $request, $id)
    {
        $meetingroom = ProductMeetingRoom::findOrFail($id);
    
        if ($request->has('meetingroom_name')) {
            $meetingroom->meetingroom_name = $request->meetingroom_name;
        }
        if ($request->has('location')) {
            $meetingroom->location = $request->location;
        }
        if ($request->has('hotline')) {
            $meetingroom->hotline = $request->hotline;
        }
        if ($request->has('note')) {
            $meetingroom->note = $request->note;
        }

        $meetingroom->save();
    
        return redirect('/product/meetingroom')->with('success', 'Employee updated successfully!');
    }
}
