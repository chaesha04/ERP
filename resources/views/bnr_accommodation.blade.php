<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales> 
            <br>
            
            <!-- ERP Data Section (yang sudah ada) -->
            <!-- <table class="header">
                <tr>
                    <td rowspan="2"><p>Accommodation List (ERP Internal)</p></td>
                    <td colspan="1"></td>
                </tr>
            </table>
            
            <div class="form-customer">
                <table style="width:100%">
                    <tr>
                        <td style="width: 50%">
                            <form method="GET" action="/bookingandreservation/accommodation">
                                <select name="field">
                                    <option value="code" {{ request('field') == 'code' ? 'selected' : '' }}>Booking Code</option>
                                    <option value="hotel_id" {{ request('field') == 'hotel_id' ? 'selected' : '' }}>Hotel ID</option>
                                    <option value="room_id" {{ request('field') == 'room_id' ? 'selected' : '' }}>Room Type</option>
                                    <option value="first_name" {{ request('field') == 'first_name' ? 'selected' : '' }}>Customer First Name</option>
                                    <option value="last_name" {{ request('field') == 'last_name' ? 'selected' : '' }}>Customer Last Name</option>
                                    <option value="check_in" {{ request('field') == 'check_in' ? 'selected' : '' }}>Check In</option>
                                    <option value="check_out" {{ request('field') == 'check_out' ? 'selected' : '' }}>Check Out</option>
                                </select>
                                <input type="text" name="keyword" placeholder="Search Accommodation" value="{{ request('keyword') }}">
                                <button type="submit">Search</button>
                                <button><a href="/bookingandreservation/accommodation">Cancel</a></button>
                            </form>
                        </td>
                        <td>
                            <p style="text-align:right; color: #6e6e6e; margin-bottom: 0;">{{ $webBooking->count() }} ERP Data | Page {{ $webBooking->currentPage() }} of {{ $webBooking->lastPage() }}</p>
                            <div style="text-align: right;">
                                @if ($webBooking->onFirstPage())
                                    <button disabled style="padding: 6px 12px; margin-right: 5px; background-color: #ccc;">❮</button>
                                @else
                                    <a href="{{ $webBooking->appends(request()->query())->previousPageUrl() }}">
                                        <button style="padding: 6px 12px; margin-right: 5px; background-color: #ff79b1; color: white;">❮</button>
                                    </a>
                                @endif

                                @if ($webBooking->hasMorePages())
                                    <a href="{{ $webBooking->appends(request()->query())->nextPageUrl() }}">
                                        <button style="padding: 6px 12px; margin-left: 5px; background-color: #ff79b1; color: white;">❯</button>
                                    </a>
                                @else
                                    <button disabled style="padding: 6px 12px; margin-left: 5px; background-color: #ccc;">❯</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
            </div> -->
            
            <!-- <table class="data">
                <thead>
                    <tr>
                        <th style="width: 10%">Booking Code</th>
                        <th style="width: 10%">Hotel ID</th>
                        <th style="width: 10%">Customer Name</th>
                        <th style="width: 10%">Check In</th>
                        <th style="width: 10%">Check Out</th>
                        <th style="width: 10%">Pax</th>
                        <th style="width: 10%">See Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($webBooking as $item)
                        <tr>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->hotel_id }}</td>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->check_in }}</td>
                            <td>{{ $item->check_out }}</td>
                            <td>{{ $item->adults }} Adult + {{ $item->child }} Child</td>
                            <td>
                                <a href="{{ url('/bookingandreservation/accommodation/'.$item->id) }}"><u>See Details</u></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No ERP data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> -->

            <!-- HOTEL DATA SECTION (BARU) -->
            <br><br>
            <table class="header">
                <tr>
                    <td rowspan="2"><p>🏨 Hotel Website Bookings (Real-time)</p></td>
                    <td colspan="1"></td>
                </tr>
            </table>
            @if(isset($hotelError) && $hotelError)
    <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin: 10px 0;">
        ❌ Cannot connect to hotel database: {{ $hotelError }}
    </div>
@else
    <div style="margin: 10px 0; padding: 10px; background: #d4edda; border-radius: 5px;">
        📊 <strong>{{ count($hotelData ?? []) }}</strong> bookings from hotel website
    </div>

    <table class="data">
        <thead>
            <tr>
                <th style="width: 10%">Booking Code</th>
                <th style="width: 10%">Hotel ID</th>
                <th style="width: 10%">Customer Name</th>
                <th style="width: 10%">Check In</th>
                <th style="width: 10%">Check Out</th>
                <th style="width: 10%">Pax</th>
                <th style="width: 10%">See Details</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hotelData ?? [] as $hotel)
                <tr>
                    <td>{{ $hotel['booking_code'] ?? 'N/A' }}</td>
                    <td>{{ $hotel['hotel_id'] ?? 'N/A' }}</td>
                    <td>{{ $hotel['first_name'] ?? 'N/A' }} {{ $hotel['last_name'] ?? ' ' }}</td>
                    <td>{{ isset($hotel['check_in']) ? \Carbon\Carbon::parse($hotel['check_in'])->format('d M Y') : 'N/A' }}</td>
                    <td>{{ isset($hotel['check_out']) ? \Carbon\Carbon::parse($hotel['check_out'])->format('d M Y') : 'N/A' }}</td>
                    <td>{{ ($hotel['adults'] ?? 0) }} Adult + {{ ($hotel['child'] ?? 0) }} Child</td>
                    <td>
                        <a href="{{ url('/bookingandreservation/accommodation/'.($hotel['id'] ?? '')) }}"><u>See Details</u></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hotel bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endif
        </div>
    </main>
</x-layout-sales>