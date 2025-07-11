<x-layout-sales>
    <x-slot:title>Group Booking Detail | {{ $groupbooking->VisitorDetail->group_name }}</x-slot:title>
    <style>

    </style>
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
                        <td>{{ $groupbooking->adult + $groupbooking->child + $groupbooking->baby }} ({{ $groupbooking->adult }} Adult + {{ $groupbooking->child }} Children + {{ $groupbooking->baby }} Baby)</td>
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
                        <td class="button-edit"><button class="button-edit" onclick="EditHotelDetail({{ $groupbooking->id }})">Edit</button></td>
                    </tr>
                </thead>
            </table>

            <table class="gbo-detail">
                <tbody>
                    <tr>
                        <th>Hotel Name</th>
                        <th>Package Type</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>
                    <tr>
                        <td style="text-align: center;">{{ $groupbooking->ProductDetail->hotel_name }}</td>
                        <td style="text-align: center;">{{ $groupbooking->package }}</td>
                        <td style="text-align: center;">{{ \Carbon\Carbon::parse($groupbooking->check_in)->format('d M Y') }}</td>
                        <td style="text-align: center;">{{ \Carbon\Carbon::parse($groupbooking->check_out)->format('d M Y') }}</td>

                    </tr>
                    <tr>
                        <th style="background-color:rgb(176, 225, 176); color: black;">Product</th>
                        <th style="background-color:rgb(176, 225, 176); color: black;">Price</th>
                        <th style="background-color:rgb(176, 225, 176); color: black;">Unit</th>
                        <th style="background-color:rgb(176, 225, 176); color: black;">Night</th>
                        <th style="background-color:rgb(176, 225, 176); color: black;">Total</th>
                    </tr>

                    {{-- Single --}}
                    <tr>
                        <td style="width: 28%">Single Occp.</td>
                        <td style="width:18%;" class="price">{{ number_format($groupbooking->singleroom_price, 0, ',', '.') }}</td>
                        <td style="width:18%;" class="price">{{ $groupbooking->single_room }} Pax</td>
                        <td style="width:18%;" class="price">{{ $groupbooking->night }} Night</td>
                        <td style="width:18%;" class="price">{{ number_format($groupbooking->singleroom_price * $groupbooking->single_room * $groupbooking->night, 0, ',', '.') }}</td>
                    </tr>

                    {{-- Twin --}}
                    <tr>
                        <td>Twin Share Occp.</td>
                        <td class="price">{{ number_format($groupbooking->twinroom_price, 0, ',', '.') }}</td>
                        <td class="price">{{ $groupbooking->twin_room }} Pax</td>
                        <td class="price">{{ $groupbooking->night }} Night</td>
                        <td class="price">{{ number_format($groupbooking->twinroom_price * $groupbooking->twin_room * $groupbooking->night, 0, ',', '.') }}</td>
                    </tr>

                    {{-- Triple --}}
                    <tr>
                        <td>Triple Share Occp.</td>
                        <td class="price">{{ number_format($groupbooking->tripleroom_price, 0, ',', '.') }}</td>
                        <td class="price">{{ $groupbooking->triple_room }} Pax</td>
                        <td class="price">{{ $groupbooking->night }} Night</td>
                        <td class="price">{{ number_format($groupbooking->tripleroom_price * $groupbooking->triple_room * $groupbooking->night, 0, ',', '.') }}</td>
                    </tr>

                    {{-- Children --}}
                    <tr>
                        <td>Children</td>
                        <td class="price">{{ number_format($groupbooking->childroom_price, 0, ',', '.') }}</td>
                        <td class="price">{{ $groupbooking->child_room }} Pax</td>
                        <td class="price">{{ $groupbooking->night }} Night</td>
                        <td class="price">{{ number_format($groupbooking->childroom_price * $groupbooking->child * $groupbooking->night, 0, ',', '.') }}</td>
                    </tr>

                    {{-- Total --}}
                    <tr>
                        <td colspan="4" class="price" style="border-top:3px solid #393939; font-weight:bold;background-color:rgb(59, 59, 59); color: white;">Total</td>
                        <td class="price" style="border-top:3px solid #393939; font-weight:bold;">
                            {{ number_format(
                                ($groupbooking->grand_total),
                            0, ',', '.') }}
                        </td>
                    </tr>

                    {{-- Deposit --}}
                    <tr>
                        <td colspan="4" class="price" style="font-weight:bold; color: rgb(250, 87, 87);background-color:rgb(59, 59, 59);">Deposit</td>
                        <td class="price" style="font-weight:bold; color: rgb(250, 87, 87);">
                            {{ number_format($groupbooking->deposit, 0, ',', '.') }}
                        </td>
                    </tr>

                    {{-- Balance --}}
                    <tr>
                        <td colspan="4" class="price" style="font-weight:bold; background-color:rgb(59, 59, 59); color: white;">Balance</td>
                        <td class="price" style="font-weight:bold;">
                            {{ number_format(
                                $groupbooking->grand_total
                                - $groupbooking->deposit,
                            0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</x-layout-sales>
<script>
    function EditHotelDetail(id){
        window.location.href = '/bookingandreservation/groupbookingorder/'+id+'/edit';
    }
    function deleteGroupBookingOrder(id) {
        if (confirm("Are you sure to delete this?")) {
            fetch(`/bookingandreservation/groupbookingorder/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert("Delete success.");
                    window.location.href = "/bookingandreservation/groupbookingorder"; // redirect ke daftar booking
                } else {
                    return response.json().then(err => { throw err; });
                }
            })
            .catch(error => {
                console.error("Error deleting:", error);
                alert("Failed to delete.");
            });
        }
    }

</script>
