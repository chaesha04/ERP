<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales> 
            <br>
            <table class="header">
                <tr>
                    <td rowspan="2"><p>Accommodation List (Website)</p></td>
                    <td colspan="1"></td>
                </tr>
            </table>
                        <div class="form-customer">
                <table style="width:100%">
                    <tr>
                        <td style="width: 50%">
                            <form method="GET" action="/bookingandreservation/accommodation">
                                <select name="field">
                                    <option value="hotel_id" {{ request('field') == 'hotel_id' ? 'selected' : '' }}>Hotel Name</option>
                                    <option value="room_id" {{ request('field') == 'room_id' ? 'selected' : '' }}>Room Type</option>
                                    <option value="first_name" {{ request('field') == 'first_name' ? 'selected' : '' }}>Customer First Name</option>
                                    <option value="last_name" {{ request('field') == 'last_name' ? 'selected' : '' }}>Customer Last Name</option>
                                    <option value="check_in" {{ request('field') == 'check_in' ? 'selected' : '' }}>Check In</option>
                                    <option value="check_out" {{ request('field') == 'check_out' ? 'selected' : '' }}>Check Out</option>
                                </select>
                                <input type="text" name="keyword" placeholder="Search Group Booking" value="{{ request('keyword') }}">
                                <button type="submits">Search</button>
                                <button><a href="/bookingandreservation/accommodation">Cancel</a></button>
                            </form>
                        </td>
                        <td>
                            <p style="text-align:right; color: #6e6e6e;">{{ $webBooking->count() }} Reservation Via Website Data | Page {{ $webBooking->currentPage() }} of {{ $webBooking->lastPage() }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <table class="data">
                <thead>
                    <tr>
                        <th style="width: 10%">Booking ID</th>
                        <th style="width: 10%">Hotel Name</th>
                        <th style="width: 10%">Customer Name</th>
                        <th style="width: 10%">Check In</th>
                        <th style="width: 10%">Check Out</th>
                        <th style="width: 10%">Pax</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 10%">See Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($webBooking as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->hotel_id }}</td>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->check_in }}</td>
                            <td>{{ $item->check_out }}</td>
                            <td>{{ $item->adults }} Adult + {{ $item->child }} Child</td>
                            <td>(belum)</td>
                            <td>
                                <a href="{{ url('/bookingandreservation/accommodation/'.$item->id) }}"><u>See Details</u></a>
                            </td>
                              
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
</x-layout-sales>
