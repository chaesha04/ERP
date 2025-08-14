<x-layoutinventory>
    <x-slot:title></x-slot:title>
    <main>
        <div class="settings">
            <div class="product-detail" style="border: 1px solid ">
                <form action="{{ url('/product/meetingroom/' . $meetingroom->id) . '/edit' }}" method="POST">
                <table class="header-detail">
                <tr>
                    <td rowspan="2"><p><a href="/product/meetingroom">Edit Meetingroom Data: [{{ $meetingroom->id }}] - {{ $meetingroom->meetingroom_name }}</a></p></td>
                    <td colspan="2"></td>
                </tr>
                <tr></tr>
                <tr>   
                    <td>
                        <a href="#"><button type="button" onclick="history.back()">Cancel</button></a>
                        {{-- <a href="#" onclick="deleteProductAccommodation({{ $meetingroom->id }})"><button>Delete</button></a> --}}
                        <button type="submit">Update</button>

                    </td>
                </tr>
            </table>
            <div class="form-edit" style="padding: 20px">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="meetingroom_name">Meetingroom Name</label>
                                <input type="text" name="meetingroom_name" id="meetingroom_name" value="{{ old('meetingroom_name', $meetingroom->meetingroom_name) }}">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $meetingroom->location) }}">

                                <label for="hotline">Hotline</label>
                                <input type="text" name="hotline" id="hotline" value="{{ old('hotline', $meetingroom->hotline) }}">                                
                            </div>

                            <div class="form-group note-group ">
                                @if ($meetingroom->note == 'Note')                                  
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" rows="14" cols="48"></textarea>
                                    @else
                                    <label for="note">Note</label>
                                    <textarea name="note" id="note" rows="14" cols="48">{{ old('note', $meetingroom->note) }}</textarea>
                                @endif
                            </div>
                        </div>
                        <div class="form-submit">
                        </div>

                        <br><br>
                </form>
            </div>  
        </div>
    </main>
</x-layoutinventory>
{{-- <script>
    function deleteMeetingRoom(id){
        if (confirm('Are you sure to delete this product?')) {
            fetch('/product/meetingroom/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.ok){
                    alert('Product Meeting Room deleted successfully!');
                    window.location.href = '/product/meetingroom';
                } else {
                    alert('Failed to delete the Product.');
                }
            });
        }
    }
    

</script> --}}


