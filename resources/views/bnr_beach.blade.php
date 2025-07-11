<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales> 
            <br>
            <table class="header">
                <tr>
                    <td rowspan="2"><p>Beach Order List (Website)</p></td>
                    <td colspan="1"></td>
                </tr>
            </table>
            <br>
            <table class="data">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Beach Name</th>
                        <th>Date</th>
                        <th>Visitor Name</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @forelse ($groupbookings as $item)
                        <tr>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->ProductDetail->hotel_name }}</td> 
                            <td>{{ ($item->adult)+($item->child) }}</td> 
                            <td>
                                <a href="{{ url('/bookingandreservation/groupbookingorder/'.$item->id) }}"><u>See Details</u></a>
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
