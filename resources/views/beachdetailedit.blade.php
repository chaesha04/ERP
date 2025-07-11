<x-layoutinventory>
    <x-slot:title></x-slot:title>
    <head>
        <style>
            .settings{
                display: flex;
            }

            .beach-detail {
                margin-left:50px;
                flex: 1;
            }

            .beach-detail a{
                text-decoration: underline;
                color:#6D6D6D;
            }

            .beach-detail ul li.title {
                list-style: none;
                color: #FF4E98;
                margin-top: 15px;
            }

            .beach-detail ul li.desc {
                list-style: none;
                color: #6D6D6D;
            }

            .note {
                width: 300px;       
                height: 180px;       
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
            <div class="beach-detail">
            <table class="header">
                <tr>
                    <td rowspan="2"><p><a href="/product/beach">Edit Product Data: {{ $beaches->beach_name }}</a></p></td>
                    <td colspan="2"></td>
                </tr>
                <tr>   
                    <td><a href="#" onclick="deleteProductBeach({{ $beaches->id }})">delete</a></td>
                </tr>
            </table>
                <form action="{{ url('/product/beach/' . $beaches->id) . '/edit' }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $beaches->location) }}">

                                <label for="hotline">Hotline</label>
                                <input type="text" name="hotline" id="hotline" value="{{ old('hotline', $beaches->hotline) }}">

                                <label for="web_avail">Web Availability</label>
                                <select name="web_avail" id="web_avail">
                                    <option value="Yes" {{ old('web_avail', $beaches->web_avail) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ old('web_avail', $beaches->web_avail) == 'No' ? 'selected' : '' }}>No</option>
                                </select>

                                @if (old('web_avail', $beaches->web_avail) === 'Yes')
                                    <label for="price">Price</label>
                                    <input type="number" style="text-align: right;" min="0" name="price" id="price" value="{{ old('price', $beaches->price) }}">
                                @endif
                            </div>

                            <div class="form-group note-group">
                                <label for="note">Note</label>
                                <textarea name="note" id="note" rows="14" cols="48">{{ old('note', $beaches->note) }}</textarea>
                            </div>
                        </div>

                        <div class="form-submit">
                            <button type="submit" class="styled-button">Update</button>
                        </div>

                        <br><br>
                        <a href="/product/beach" class="back-button"><u>← Back to List</u></a>
                    </form>
                
            </div>
        </div>
    </main>
</x-layoutinventory>
<script>
    function deleteProductBeach(id){
        if (confirm('Are you sure to delete this product?')) {
            fetch('/product/beach/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.ok){
                    alert('Product Beach deleted successfully!');
                    window.location.href = '/product/beach';
                } else {
                    alert('Failed to delete the Product.');
                }
            });
        }
    }
    

</script>
