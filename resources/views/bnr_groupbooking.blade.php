<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales> 
            <table class="header">
                <tr>
                    <td><p>Group Booking List</p></td>
                    <td><a href="/addnew"><button class="styled-button">Add New</button></a></td>
                </tr>
            </table>
            <table class="data">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Hotel Name</th>
                        <th>Pax</th>
                        <th>Visitor Name</th>
                        <th>PIC</th>
                        <th>See Details</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @forelse ($groupbookings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->HotelDetail->hotel_name }}</td> 
                            <td>{{ $item->pax }}</td> 
                            <td>{{ $item->VisitorName->visitor_name }}</td> 
                            <td>{{ $item->Employee->name }}</td> 
                            <td>
                                <a href="{{ url('/bookingandreservation/groupbooking/'.$item->id) }}">See Details</a>
                            </td>
                              
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No data found.</td>
                        </tr>
                    @endforelse
                </tbody> --}}
            </table>
    </div>
    </main>
</x-layout-sales>