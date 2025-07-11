<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
        <div class="settings">
            <x-navbarproduct></x-navbarproduct>
            <table class="header">
                <tr>
                    <td> <h1>Beach List</h1></td>
                    <td><a href="/product/beach/addnew">+</a></td>
                </tr>
            </table>
            <table class="data">
            <thead>
                <tr>
                    <th>Beach ID</th>
                    <th>Beach Name</th>
                    <th>Location</th>
                    <th>Hotline</th>
                    <th>Web Availability</th>
                    <th>Price</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beaches as $beach)
                    <tr>
                        <td>{{ $beach->id }}</td>
                        <td>{{ $beach->beach_name }}</td>
                        <td>{{ $beach->location }}</td>
                        <td>{{ $beach->hotline }}</td>
                        <td>{{ $beach->web_avail }}</td>
                        <td>{{ $beach->price }}</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main> 
</x-layoutinventory>
