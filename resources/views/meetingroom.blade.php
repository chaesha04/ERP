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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($meetingrooms as $item)
                        <tr>
                            <td>{{ $item->meetingroom_name }}</td>
                            <td>{{ $item->location }}</td> 
                            <td>{{ $item->hotline }}</td> 
                            <td>{{ $item->note }}</td> 

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
