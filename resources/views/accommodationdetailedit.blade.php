<x-layoutinventory>
    <x-slot:title>Product | Accommodation Edit: {{ $accommodation->hotel_name }}</x-slot:title>
    <main>
        <div class="settings">
            <div class="product-detail" style="border: 1px solid ">
                <form action="{{ url('/product/accommodation/' . $accommodation->id) . '/edit' }}" method="POST">
                <table class="header-detail">
                    <tr>
                        <td rowspan="2"><p><a href="/product/accommodation">Edit Accommodation Data : [{{ $accommodation->id }}] - {{ $accommodation->hotel_name }}</a></p></td>
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
                                <label for="hotel_name">Hotel Name</label>
                                <input type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', $accommodation->hotel_name) }}">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $accommodation->location) }}">

                                <label for="hotline">Hotline</label>
                                <input type="text" name="hotline" id="hotline" value="{{ old('hotline', $accommodation->hotline) }}">
                                
                                <label for="hotel_name">Hotel Name</label>
                                <input type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', $accommodation->hotel_name) }}">
                            </div>

                            <div class="form-group note-group ">
                                @if ($accommodation->note == 'Note')                                  
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" rows="14" cols="48"></textarea>
                                    @else
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" rows="14" cols="48">{{ old('note', $accommodation->note) }}</textarea>
                                @endif
                            </div>
                        </div>

                        <div class="form-submit">
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
