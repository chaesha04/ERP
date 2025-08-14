<x-layoutinventory>
    <x-slot:title></x-slot:title>
    <head>
        <style>
            .settings{
                display: flex;
            }
            
        </style>
    </head>
    <main>
        <div class="settings">
            <div class="product-detail">
            <table class="header-detail">
                <tr>
                    <td rowspan="2"><p><a href="/product/beach">{{ $beaches->beach_name }}</a></p></td>
                    <td colspan="2"></td>
                </tr>
                <tr>   
                    <td><a href="#" onclick="editbeach({{ $beaches->id }})">Edit</a></td>
                    <td><a href="#" onclick="deleteProductBeach({{ $beaches->id }})">delete</a></td>
                </tr>
            </table>
                <ul>
                    <li class="title">Location</li>
                    <li class="desc">{{ $beaches->location }}</li>

                    <li class="title">Hotline</li>
                    <li class="desc">{{ $beaches->hotline }}</li>

                    <li class="title">Web Availability</li>
                    <li class="desc">{{ $beaches->web_avail }}</li>

                    @if ($beaches->web_avail === 'Yes')
                        <li class="title">Price</li>
                        <li class="desc">{{ $beaches->price }}</li>
                    @endif
                </ul>
                
                <br><br>
                
            </div>
            
            <div class="note-product-detail">
                Add Note:<br><br>
                {{ $beaches->note }}
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
    function editbeach(id){
        window.location.href = '/product/beach/'+id+'/edit';
    }
    

</script>
