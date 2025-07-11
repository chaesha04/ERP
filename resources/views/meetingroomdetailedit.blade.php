<x-layoutinventory>
    <x-slot:title></x-slot:title>
    <head>
        <style>
            .settings{
                display: flex;
            }

            .note {
                width: 300px;         /* ukuran lebar yang lebih kecil */
                height: 180px;        /* tinggi lebih pas seperti gambar */
                border: 1px solid #B0B0B0;
                padding: 20px;
                background-color: transparent;
                color: black;
                border-radius: 6px;
                font-size: 14px;
                margin-right:150px;
                margin-top:150px;
            }
            
        </style>
    </head>
    <main>
        <div class="settings">
            <div class="product-detail">
                <table class="header-detail">
                    <tr>
                        <td rowspan="2" class="title"><p><a href="/product/meetingroom">{{ $meetingroom->meetingroom_name }}</a></p></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>   
                        <td><a href="#" onclick="deleteProductMeetingRoom({{ $meetingroom->id }})">delete</a></td>
                    </tr>
                </table>
                <form action="{{ url('/product/beach/' . $meetingroom->id) . '/edit' }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $meetingroom->location) }}">

                                <label for="hotline">Hotline</label>
                                <input type="text" name="hotline" id="hotline" value="{{ old('hotline', $meetingroom->hotline) }}">

                            </div>

                            <div class="form-group note-group">
                                <label for="note">Note</label>
                                <textarea name="note" id="note" rows="14" cols="48">{{ old('note', $meetingroom->note) }}</textarea>
                            </div>
                        </div>

                        <div class="form-submit">
                            <button type="submit" class="styled-button">Update</button>
                        </div>

                        <br><br>
                        <a href="/product/meetingroom" class="back-button"><u>← Back to List</u></a>
                    </form>
                
            </div>
        </div>
    </main>
</x-layoutinventory>
<script>
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
    

</script>


