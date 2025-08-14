<x-layoutinventory>
    <x-slot:title> Product | Accomodation: {{ $accomodation->hotel_name }}</x-slot:title>
    <head>
        <style>
            .settings-display{
                display: flex;
            }
            .data-button td{
                border: 1px solid black;
                padding-left: 8px;
                padding-right: 8px;
                padding-bottom: 4px;
                border-radius: 8px;
            }
            .data-button td:hover{
                border: 1px solid black;
                padding-left: 8px;
                padding-right: 8px;
                padding-bottom: 4px;
                border-radius: 8px;
                background-color: navy;
            }
            .data-button td a:hover{
                color: white;

            }
        </style>
    </head>
    <main>
        <div class="settings">
            <div class="data" style="margin-bottom: 70px">
                <table class="data">
                    <thead>
                        <tr>
                            <td colspan="5" style="text-align: left; font-size: 34px; background-color: transparent;">{{ $accomodation->hotel_name }}</td>
                        </tr>
                        <tr>
                        <td colspan="5" style="text-align: left;background-color: transparent;">
                            <div class="form-customer">
                                    <button onclick="Cancel({{ $accomodation->id }})">Cancel</button>
                                    <button onclick="editProductAccommodation({{ $accomodation->id }})">Edit Product</button>
                                    <button onclick="deleteProductAccommodation({{ $accomodation->id }})">Delete Product</button>
                                </a>
                            </div>
                        </td>

                        </tr>
                        <tr>
                            <th style="background-color:pink;">Hotel ID</th>
                            <th style="background-color:pink;">Location</th>
                            <th style="background-color:pink;">Hotline</th>
                            <th style="background-color:pink;">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $accomodation->id }}</td>
                            <td>{{ $accomodation->location }}</td>
                            <td>{{ $accomodation->hotline }}</td>
                            <td>{{ $accomodation->note }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-data" style="border: 2px solid rgb(155, 155, 155); padding: 10px; border-radius:5px;">
                <div class="data-button" >
                    <table>
                        <tr>
                            <td><a href="/product/accommodation/{{ $accomodation->id }}/addnew_roomtype">+ Add New Room</a></td>
                        </tr>
                    </table>
                </div>
                <table class="data">
                    <thead class="table-dark">
                        <tr>
                            <th colspan="6">ROOM TYPE : {{ strtoupper($accomodation->hotel_name) }}</th>
                        </tr>
                        <tr>
                            <th style="width:30%;">Room Type</th>
                            <th style="width:18%;">Bedroom Qty</th>
                            <th style="width:18%;">Unit</th>
                            <th style="width:18%;">Extra Facility</th>
                            <th style="width:18%;" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accomodation->hotelDetails as $rooms)
                            <tr>
                                <td>{{ $rooms->room_type }}</td>
                                <td>{{ $rooms->bedroom_qty }} Bedroom</td>
                                <td>{{ $rooms->unit }} Unit</td>
                                <td>{{ $rooms->extra_facility }}</td>
                                <td><a href="#" onclick="editHotelDetail({{ $rooms->id }})">Edit</a></td>
                                <td><a href="#" onclick="deleteHotelDetail({{ $rooms->id }})">Delete</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">The room type for this hotel is empty.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div id="edit-hotel-detail" style="display: none; margin-top: 40px;">
                    <form method="POST" action="/hotel-details">
                        @csrf
                        <table class="data">
                            <tr>
                                <th colspan="4" style="text-transform:capitalize;">Edit Room Type: {{ $item->room_type }}</th>
                            </tr>
                            <tr>
                                <th><label>Room Type</label></th>
                                <th><label>Qty of Bedroom</label></th>
                                <th><label>Unit</label></th>
                                <th><label>Extra Facility</label></th>
                            </tr>
                            <tr>
                                <input type="hidden" name="accomodation_id" value="{{ $accomodation->id }}">
                                @foreach ( $accomodation->HotelDetail as $selectedroom)
                                    
                                <td>
                                    <input type="text" name="room_type" value="{{ old('room_type', $selectedroom->room_type) }}">
                                </td>
                                <td>
                                    <input type="number" name="bedroom_qty" value="{{ old('bedroom_qty', $selectedroom->bedroom_qty) }}" min="0"> Bedroom
                                </td>
                                <td>
                                    <input type="number" name="uniqt" id="unit" value="{{ old('unit', $selectedroom->unit) }}"> Unit
                                </td>
                                <td>
                                    <input type="text" name="extra_facility" id="extra_facility" value="{{ old('extra_facility', $selectedroom->extra_facility) }}">
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align:right; padding-right: 20px;">
                                    <button type="submit" class="styled-button">Update {{ $item->room_type }}</button>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div> --}}
            </div>
        </div>
    </main>
</x-layoutinventory>
<script>
    const hotelName = "{{ urlencode($accomodation->room_type) }}";
    
    function deleteHotelDetail(id){
        if (confirm('Are you sure to delete this room type?')) {
            fetch('/product/accommodation/hoteldetail/' + id +'/delete', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.ok){
                    alert('Room type deleted successfully!');
                    location.reload();

                } else {
                    alert('Failed to delete the room type.');
                }
            });
        }
    }
    function editHotelDetail(id) {
        window.location.href = '/product/accommodation/hoteldetail/'+id+'/edit';
    }


    function deleteProductAccommodation(id){
        if (confirm('Are you sure to delete this accommodation?')) {
            fetch('/product/accommodation/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.ok){
                    alert('Product accommodation deleted successfully!');
                    window.location.href = '/product/accommodation';
                } else {
                    alert('Failed to delete the Product.');
                }
            });
        }
    }
    function editProductAccommodation(id){
        window.location.href = '/product/accommodation/'+id+'/edit';
    }

    function Cancel(id){
        window.location.href = '/product/accommodation';
    }
</script>
