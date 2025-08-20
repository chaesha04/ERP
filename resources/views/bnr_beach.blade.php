<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales> 
            <br>
            
            <!-- TICKET ORDERS SECTION -->
            <table class="header">
                <tr>
                    <td rowspan="2"><p>🎫 Beach Ticket Orders (Real-time)</p></td>
                    <td colspan="1">
                        <div style="text-align: right;">
                            <a href="/bookingandreservation/accommodation" style="background: #28a745; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px;">
                                🏨 View Accommodations
                            </a>
                        </div>
                    </td>
                </tr>
            </table>

            @if(isset($hotelError) && $hotelError)
                <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin: 10px 0;">
                    ❌ Cannot connect to hotel database: {{ $hotelError }}
                </div>
            @else
                <!-- SEARCH FORM -->
                <div class="form-customer">
                    <table style="width:100%">
                        <tr>
                            <td style="width: 50%">
                                <form method="GET" action="/bookingandreservation/ticket-orders">
                                    <select name="field">
                                        <option value="booking_code" {{ request('field') == 'booking_code' ? 'selected' : '' }}>Order Code</option>
                                        <option value="customer_name" {{ request('field') == 'customer_name' ? 'selected' : '' }}>Customer Name</option>
                                        <option value="customer_email" {{ request('field') == 'customer_email' ? 'selected' : '' }}>Customer Email</option>
                                        <option value="visit_date" {{ request('field') == 'visit_date' ? 'selected' : '' }}>Visit Date</option>
                                        <option value="payment_status" {{ request('field') == 'payment_status' ? 'selected' : '' }}>Payment Status</option>
                                    </select>
                                    <input type="text" name="keyword" placeholder="Search Ticket Orders" value="{{ request('keyword') }}">
                                    <button type="submit">Search</button>
                                    <button><a href="/bookingandreservation/ticket-orders">Cancel</a></button>
                                </form>
                            </td>
                            <td>
                                <p style="text-align:right; color: #6e6e6e; margin-bottom: 0;">{{ count($hotelTickets ?? []) }} Ticket Orders Found</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- TICKET ORDERS TABLE -->
                <table class="data">
                    <thead>
                        <tr>
                            <th style="width: 12%">Order Code</th>
                            <th style="width: 15%">Customer Name</th>
                            <th style="width: 12%">Visit Date</th>
                            <th style="width: 8%">Quantity</th>
                            <th style="width: 12%">Total Price</th>
                            <th style="width: 10%">Payment Status</th>
                            <th style="width: 10%">Order Type</th>
                            <th style="width: 11%">See Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hotelTickets ?? [] as $ticket)
                            <tr>
                                <td>{{ $ticket['order_code'] ?? 'N/A' }}</td>
                                <td>{{ $ticket['customer_name'] ?? 'N/A' }}</td>
                                <td>{{ isset($ticket['visit_date']) ? \Carbon\Carbon::parse($ticket['visit_date'])->format('d M Y') : 'N/A' }}</td>
                                <td style="text-align: center;">{{ $ticket['quantity'] ?? 0 }}</td>
                                <td style="text-align: right;">Rp {{ number_format($ticket['total_price'] ?? 0) }}</td>
                                <td>
                                    <span style="padding: 4px 8px; border-radius: 3px; font-size: 11px; 
                                        background: {{ ($ticket['is_offline_order'] ?? 0) ? '#f8d7da' : '#d1ecf1' }}; 
                                        color: {{ ($ticket['is_offline_order'] ?? 0) ? '#721c24' : '#0c5460' }};">
                                        {{ ($ticket['is_offline_order'] ?? 0) ? 'OFFLINE' : 'ONLINE' }}
                                    </span>
                                </td>
                                <td>{{ $ticket['payment_method'] ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ url('/bookingandreservation/beach/'.($ticket['id'] ?? '')) }}"><u>See Details</u></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No ticket orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            @endif

        </div>
    </main>
</x-layout-sales>