<x-layoutinventory>
    <x-slot:title>
    Product | Watersport Edit: {{ $item->watersport }}</x-slot:title>
    <main>
        <div class="settings">
            <div class="product-detail" style="border: 1px solid ">
                <form action="{{ url('/product/watersport/' . $item->id . '/edit') }}" method="POST">
                <table class="header-detail">
                <tr>
                    <td rowspan="2"><p><a href="/product/item">Edit Watersport Data: [{{ $item->id }}] - {{ $item->watersport }}</a></p></td>
                    <td colspan="2"></td>
                </tr>
                <tr></tr>
                <tr>   
                    <td>
                        <a href="#"><button type="button" onclick="history.back()">Cancel</button></a>
                        {{-- <a href="#" onclick="deleteWatersport({{ $item->id }})"><button>Delete</button></a> --}}
                        <button type="submit">Update</button>

                    </td>
                </tr>
            </table>
            <div class="form-edit" style="padding: 20px">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <table style="width: 100%">
                                    <tr>
                                        <td>
                                            <label for="watersport">Watersport</label>
                                            <input type="text" name="watersport" id="watersport" value="{{ old('watersport', $item->watersport) }}">
                                        </td>
                                        <td>
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" value="{{ old('price', $item->price) }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="unit">unit</label>
                                            <input type="text" name="unit" id="unit" value="{{ old('unit', $item->unit) }}">
                                        </td>
                                        <td>
                                            <label for="note">Note</label>
                                            <input type="text" name="note" id="note" value="{{ old('note', $item->note) }}">
                                        </td>
                                    </tr>
                                </table>
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
<script>
    function deleteWatersport(id){
        if (confirm('Are you sure to delete this product?')) {
            fetch('/product/watersport/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.ok){
                    alert('Product Watersport deleted successfully!');
                    window.location.href = '/product/watersport';
                } else {
                    alert('Failed to delete the Product.');
                }
            });
        }
    }
    

</script>


