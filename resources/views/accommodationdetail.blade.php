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
                                <a href="#" onclick="Cancel({{ $accomodation->id }})"><button class="button-style">Cancel</button></a>
                                <a href="#" onclick="editProductAccommodation({{ $accomodation->id }})"><button class="button-style">Edit Product</button></a>
                                <a href="#" onclick="deleteProductAccommodation({{ $accomodation->id }})"><button class="button-style">Delete Product</button></a>
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
                        @forelse ($hotelDetails as $item)
                            <tr>
                                <td>{{ $item->room_type }}</td>
                                <td>{{ $item->bedroom_qty }} Bedroom</td>
                                <td>{{ $item->unit }} Unit</td>
                                <td>{{ $item->extra_facility }}</td>
                                <td><a href="#">Edit</a></td>
                                <td><a href="#" onclick="deleteHotelDetail({{ $item->id }})">Delete</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No room details found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-layoutinventory>
<script>
    const hotelName = "{{ urlencode($accomodation->hotel_name) }}";
        
function deleteHotelDetail(id){
    if (confirm('Are you sure to delete this room type?')) {
        fetch('/hotel-detail/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
        })
        .then(response => {
            if (response.ok){
                alert('Room type deleted successfully!');
                window.location.href = '/product/accommodation/';

            } else {
                alert('Failed to delete the room type.');
            }
        });
    }
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
        window.location.href = '/product/accommodation/';
    }
    

</script>
