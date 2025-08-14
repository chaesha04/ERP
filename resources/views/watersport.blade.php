<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
        <div class="settings">
            <x-navbarproduct></x-navbarproduct>
            <table class="header">
                <tr>
                    <td> <h1>Watersport and Land Acitivites List</h1></td>
                    <td><a href="/product/addnew_activities">+</a></td>
                </tr>
            </table>
            <table class="data">
                <thead>
                    <tr>
                        <th style="width:23%;">Product Name</th>
                        <th style="width:23%;">Price</th>
                        <th style="width:23%;">Unit</th>
                        <th style="width:23%;">Note</th>
                        <th style="width:10%;" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities as $item)
                        <tr>
                            <td>{{ $item->watersport }}</td>
                            <td>{{ $item->price }}</td> 
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->note }}</td> 
                            <td><a href="#" onclick="editWatersport({{ $item->id }})">Edit</a></td>
                            <td><a href="#" onclick="deleteWatersport({{ $item->id }})">delete</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</x-layoutinventory>
<script>
    function editWatersport(id){
        window.location.href = `/product/watersport/${id}/edit`;
    }
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