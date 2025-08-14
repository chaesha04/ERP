<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
        <div class="settings">
            <x-navbarproduct></x-navbarproduct>
            <table class="header">
                <tr>
                    <td> <h1>Meetingroom List</h1></td>
                    <td><a href="/product/addnew_meetingroom">+</a></td>
                </tr>
            </table>
            <table class="data">
                <thead>
                    <tr>
                        <th>Meeting Room Name</th>
                        <th>Location</th>
                        <th>Hotline</th>
                        <th>Note</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($meetingrooms as $item)
                        <tr>
                            <td>{{ $item->meetingroom_name }}</td>
                            <td>{{ $item->location }}</td> 
                            <td>{{ $item->hotline }}</td> 
                            <td>{{ $item->note }}</td> 
                            <td><a href="/product/meetingroom/{{ $item->id }}/edit">Edit</a></td>
                            <td><a href="#" onclick="deleteMeetingRoom({{ $item->id }})">Delete</a></td>

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
    function deleteMeetingRoom(id) {
        if (confirm('Are you sure to delete this meetingroom?')) {
            fetch('/product/meetingroom/' + id + '/delete', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(response => {
                if (response.ok){
                    alert('Product meetingroom deleted successfully!');
                    window.location.href = '/product/meetingroom';
                } else {
                    alert('Failed to delete the Product.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong.');
            });
        }
    }
    
</script>
