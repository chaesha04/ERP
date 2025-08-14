<x-layout-sales>
    <head>
        <style>
            table.gbo-visitordetail{
                padding: 15px;
                width: 100%;
                border: 1px solid #000;
                align-content: center;
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;
                text-align: left;
                padding-bottom:50px;
            }
            table.gbo-visitordetail th, table.gbo-visitordetail td{
                padding-left: 10px;
                padding-right: 20px;
            }
            table.gbo-visitordetail th{
                padding-top: 25px;
                font-size: 16px;
                background-color: transparent;
                color: #393939;
            }
            table.gbo-visitordetail td{
                background-color:transparent;
                padding-bottom: 25px;
            }
        </style>
    </head>
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
                        <td class="button-edit"><button class="button-edit" onclick="EditVisitorDetail({{ $groupbooking->id }})">Edit</button></td>
                    </tr>    
                </thead>
            </table>
            <table class="gbo-visitordetail">
                <tbody>
                    <tr>
                        <th>Visitor Name</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <td>{{ $groupbooking->VisitorDetail->visitor_name }}</td>
                        <td>{{ $groupbooking->VisitorDetail->phone_number }}</td>
                        <td>{{ $groupbooking->VisitorDetail->sex }}</td>
                        <td>{{ $groupbooking->VisitorDetail->email }}</td>
                    </tr>
                <tbody>
                    <tr>
                        <th>Group Name</th>
                        <th>Company Number</th>
                        <th>Country</th>
                        <th>Group Address</th>
                    </tr>
                    <tr>
                        <td>{{ $groupbooking->VisitorDetail->group_name }}</td>
                        <td>{{ $groupbooking->VisitorDetail->company_number }}</td>
                        <td>{{ $groupbooking->VisitorDetail->country }}</td>
                        <td>{{ $groupbooking->VisitorDetail->group_address }}</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </main>
</x-layout-sales>
<script>
    function EditVisitorDetail(id){
        window.location.href='/bookingandreservation/groupbookingorder/'+id+'/visitoredit';
    }
</script>