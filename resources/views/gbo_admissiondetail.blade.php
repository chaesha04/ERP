<x-layout-sales>
    <x-slot:title>Group Booking Detail | {{ $groupbooking->VisitorDetail->group_name }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales>
            <br><br>
            <table>
                <tr>
                    <td class="button-edit"><button class="button-edit" onclick="deleteGroupBookingOrder({{ $groupbooking->id }})">Delete: {{ $groupbooking->slug }}</button></td>
                </tr>
            </table>
            <table class="data">
                <thead>
                    <tr>
                        <th style="width:20%;">Booking ID</th>
                        <th style="width:20%;">Hotel Name</th>
                        <th style="width:20%;">Pax</th>
                        <th style="width:20%;">Group Name</th>
                        <th style="width:20%;">PIC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $groupbooking->slug }}</td>
                        <td>{{ $groupbooking->ProductDetail->hotel_name }}</td> 
                        <td>{{  ($groupbooking->adult)+($groupbooking->child)+($groupbooking->baby) }} ({{ $groupbooking->adult }} Adult + {{ $groupbooking->child }} Children + {{ $groupbooking->baby }} Baby)</td>
                        <td>{{ $groupbooking->VisitorDetail->group_name }}</td> 
                        <td>{{ $groupbooking->SalesDetail->name }}</td> 
                    </tr>
                </tbody>
            </table>
            <br><br><br>       
            <table class="navlinkgbo">
                <thead>
                    <tr>
                        <td class="{{ request()->is('bookingandreservation/groupbookingorder/' . $groupbooking->id) ? 'active' : '' }}">
                            <a href="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id) }}">
                                Hotel Detail
                            </a>
                        </td>
                        <td class="{{ request()->is('bookingandreservation/groupbookingorder/' . $groupbooking->id . '/visitordetail') ? 'active' : '' }}">
                            <a href="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id . '/visitordetail') }}">
                                Visitor Detail
                            </a>
                        </td>
                        <td class="{{ request()->is('bookingandreservation/groupbookingorder/' . $groupbooking->id . '/admissiondetail') ? 'active' : '' }}">
                            <a href="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id . '/admissiondetail') }}">
                                Admission Detail
                            </a>
                        </td>
                    </tr>    
                </thead>
            </table>
            @php
    $documentTypes = [
        'offering_letter' => 'Offering Letter',
        'confirmation_letter' => 'Confirmation Letter',
        'guarantee_letter' => 'Guarantee Letter',
        'banquet_event_order' => 'Banquet Event Order',
    ];
@endphp

<table class="gbo-detail">
    <tr>
        <th style="width: 25%;">Document Name</th>
        <th style="width: 25%;">System Generated</th>
        <th style="width: 25%;">Uploaded Document</th>
        <th style="width: 25%;">Upload Assign Document</th>
    </tr>

    @foreach($documentTypes as $docType => $docLabel)
        @php
            $uploadedDoc = $groupbooking->documents->where('document_type', $docType)->first();

            // Define download links based on type
            $systemGeneratedLinks = [
                'offering_letter' => url('/groupbooking/pdf/offeringletter/' . $groupbooking->id),
                'confirmation_letter' => url('/groupbooking/pdf/' . $groupbooking->id),
                'guarantee_letter' => url('/groupbooking/pdf/guaranteeletter/' . $groupbooking->id),
                'banquet_event_order' => url('/groupbooking/pdf/banqueteventorder/' . $groupbooking->id),
            ];
        @endphp

        <tr>
            <td style="text-align:center;">{{ $docLabel }}</td>

            {{-- SYSTEM GENERATED --}}
            <td style="text-align:center;">
                @if(isset($systemGeneratedLinks[$docType]))
                    <a href="{{ $systemGeneratedLinks[$docType] }}" target="_blank">
                        Download {{ $docLabel }}
                    </a>
                @else
                    <span style="color: gray;">-</span>
                @endif
            </td>

            {{-- UPLOADED DOCUMENT --}}
            <td style="text-align:center;">
                @if($uploadedDoc)
                    <a href="{{ Storage::url($uploadedDoc->file_path) }}" target="_blank">View Uploaded</a>
                @else
                    <span style="color: gray;">No upload</span>
                @endif
            </td>

            {{-- UPLOAD FORM --}}
            <td style="text-align:center;">
                <form action="{{ route('groupbookingorder.uploadDocument', $groupbooking->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="document_file" required>
                    <input type="hidden" name="document_type" value="{{ $docType }}">
                    <button type="submit">Upload</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

        <br><br>
            <hr>
            <table class="navlinkgbo">
                <thead>
                    <tr>
                        <td>
                            <a href="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id . '/add_event') }}">
                                Add Event (BEO)
                            </a>
                        </td>
                        {{-- <td><a href="#">Edit Event (BEO)</a></td> --}}
                    </tr>
                </thead>
            </table>
            <table class="gbo-detail">
                <tr>
                    <th colspan="67">Event</th>
                </tr>
                <tr>
                    <th style="width: 17%">Date</th>
                    <th style="width: 17%">Start</th>
                    <th style="width: 17%">End</th>
                    <th style="width: 20%">Activity</th>
                    <th style="width: 20%">Place</th>
                    <th style="width: 9%">Action</th>
                </tr>
                @foreach ($groupbooking->EventBEO as $event)
                <tr>
                    <td>{{ $event->date }}</td>
                    <td style="text-align:center;">{{ $event->start }}</td>
                    <td style="text-align:center;">{{ $event->end }}</td>
                    <td style="text-align:center;">{{ $event->activities }}</td>
                    <td style="text-align:center;">{{ $event->place }}</td>
                    <td style="text-align: center;">
                        <form action="{{ route('eventbeo.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this event?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>        
                </tr>
                @endforeach
            </table>
            <br>
            <table class="navlinkgbo">
                <thead>
                    <tr>
                        <td>
                            <a href="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id . '/add_breakdown') }}">
                                Add Breakdown (BEO)
                            </a>
                        </td>
                        {{-- <td><a href="#">Edit Breakdown (BEO)</a></td> --}}
                    </tr>
                </thead>
            </table>
            <table class="gbo-detail">
                <tr>
                    <th colspan="6">Breakdown</th>
                </tr>
                <tr>
                    <th style="width: 20%;">Product</th>
                    <th style="width: 18%;">Price</th>
                    <th style="width: 16%;">Unit</th>
                    <th style="width: 16%;">Night</th>
                    <th style="width: 20%;">Total/price</th>
                    <th style="width: 10%;">Action</th>
                </tr>
                
                    @foreach ($groupbooking->BreakdownBeo as $breakdown)
                    <tr>
                        <td>{{ $breakdown->product }}</td>
                        <td style="text-align:right; ">{{ $breakdown->price }}</td>
                        <td style="text-align:right; ">{{ $breakdown->unit }}</td>
                        <td style="text-align:right; ">{{ $breakdown->night }}</td>
                        <td style="text-align:right; ">{{ $breakdown->total_price }}</td>
                        <td style="text-align: center;">
                            <form action="{{ route('breakdownbeo.destroy', $breakdown->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this breakdown?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <br>
            <table class="navlinkgbo">
                <thead>
                    <tr>
                        <td><a href="/bookingandreservation/groupbookingorder/{{$groupbooking->id}}/add_note">Add Note (BEO)</a></td>
                        <td><a href="#">Edit Note (BEO)</a></td>
                    </tr>
                </thead>
            </table>
<table class="gbo-detail">
    <tr>
        <th colspan="7">Note BEO</th>
    </tr>
    <tr>
        <th style="width: 12.5%">Housekeeping</th>
        <th style="width: 12.5%">Engineer</th>
        <th style="width: 12.5%">Accounting</th>
        <th style="width: 12.5%">Kitchen</th>
        <th style="width: 12.5%">Sport</th>
        <th style="width: 12.5%">FnB</th>
        <th style="width: 12.5%">Lalassa Beach Club</th>
    </tr>
    <tr>
        <td>{{ $groupbooking->NoteBEO->note_housekeeping ?? '-' }}</td>
        <td>{{ $groupbooking->NoteBEO->note_engineer ?? '-' }}</td>
        <td>{{ $groupbooking->NoteBEO->note_accounting ?? '-' }}</td>
        <td>{{ $groupbooking->NoteBEO->note_kitchen ?? '-' }}</td>
        <td>{{ $groupbooking->NoteBEO->note_sport ?? '-' }}</td>
        <td>{{ $groupbooking->NoteBEO->note_fnb ?? '-' }}</td>
        <td>{{ $groupbooking->NoteBEO->note_lalassa ?? '-' }}</td>
    </tr>
</table>

        </div>
    </main>
</x-layout-sales>