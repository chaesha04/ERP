<x-layoutinventory>
    <x-slot:title>Product | Accommodation Edit: {{ $room->hotel_name }}</x-slot:title>
    <main>
        <div class="settings">
            <div class="product-detail" style="border: 1px solid ">
                <form action="{{ url('/product/accommodation/hoteldetail/' . $room->id . '/edit') }}" method="POST">
                <table class="header-detail">
                    <tr>
                        <td rowspan="2"><p><a href="/product/accommodation">Edit Data: [{{ $room->id }}] - {{ $room->room_type }} Room Type in {{ $room->ProductAccommodation->hotel_name }} Accommodation</a></p></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr></tr>
                    <tr>   
                        <td>
                            <a href="#"><button type="button" onclick="history.back()">Cancel</button></a>
                            <button type="submit">Update</button>

                        </td>
                    </tr>
                </table>
            <div class="form-edit" style="padding: 20px">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="room_type">Room Type Name</label>
                                <input type="text" name="room_type" id="room_type" value="{{ old('room_type', $room->room_type) }}">
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="bedroom_qty">bedroom Quantity</label>
                                        <input style="width:80%;" type="number" name="bedroom_qty" id="bedroom_qty" value="{{ old('bedroom_qty', $room->bedroom_qty) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="unit">Unit</label>
                                        <input style="width:80%;" type="text" name="unit" id="unit" value="{{ old('unit', $room->unit) }}">
                                    </div>
                                </div>

                                <label for="extra_facility">Extra Facility</label>
                                <input type="text" name="extra_facility" id="extra_facility" value="{{ old('extra_facility', $room->extra_facility) }}">

                            </div>
                        </div>

                        <br><br>
                </form>
            </div>
    </main>
</x-layoutinventory>
<script>
    //     if (confirm('Are you sure to delete this product?')) {
    //         fetch('/product/accommodation/' + id, {
    //             method: 'DELETE',
    //             headers: {
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
    //                 'Accept': 'application/json'
    //             },
    //         })
    //         .then(response => {
    //             if (response.ok){
    //                 alert('Product accommodation deleted successfully!');
    //                 window.location.href = '/product/accommodation';
    //             } else {
    //                 alert('Failed to delete the Product.');
    //             }
    //         });
    //     }
    // }
    function Cancel(id){
        window.location.href='/product/accommodation/'+id;
    }
    

</script>
