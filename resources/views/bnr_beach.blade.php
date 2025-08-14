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
            <div class="form-customer">
                <table style="width:100%">
                    <tr>
                        <td style="width: 50%">
                            <form method="GET" action="/bookingandreservation/beach">
                                <select name="field">
                                    <option value="order_code" {{ request('field') == 'order_code' ? 'selected' : '' }}>Ticket Code</option>
                                    <option value="beach_ticket_id" {{ request('field') == 'beach_ticket_id' ? 'selected' : '' }}>Beach ID</option>
                                    <option value="customer_name" {{ request('field') == 'customer_name' ? 'selected' : '' }}>Customer Name</option>
                                    <option value="customer_phone" {{ request('field') == 'customer_phone' ? 'selected' : '' }}>Customer Phone Number</option>
                                    <option value="visit_date" {{ request('field') == 'visit_date' ? 'selected' : '' }}>Visit Date</option>
                                </select>
                                <input type="text" name="keyword" placeholder="Search Beach Ticket" value="{{ request('keyword') }}">
                                <button type="submits">Search</button>
                                <button><a href="/bookingandreservation/beach">Cancel</a></button>
                            </form>
                        </td>
                        <td>
                            <p style="text-align:right; color: #6e6e6e; margin-bottom: 0;">{{ $beachorderweb->count() }} Reservation Via Website Data | Page {{ $beachorderweb->currentPage() }} of {{ $beachorderweb->lastPage() }}</p>
                            <div class="" style="text-align: right;">
                                    @if ($beachorderweb->onFirstPage())
                                        <button disabled style="padding: 6px 12px; margin-right: 5px; background-color: #ccc; border: none; border-radius: 4px;">❮</button>
                                    @else
                                        <a href="{{ $beachorderweb->appends(request()->query())->previousPageUrl() }}">
                                            <button style="padding: 6px 12px; margin-right: 5px; background-color: #ff79b1; color: white; border: none; border-radius: 4px;">❮</button>
                                        </a>
                                    @endif

                                    @if ($beachorderweb->hasMorePages())
                                        <a href="{{ $beachorderweb->appends(request()->query())->nextPageUrl() }}">
                                            <button style="padding: 6px 12px; margin-left: 5px; background-color: #ff79b1; color: white; border: none; border-radius: 4px;">❯</button>
                                        </a>
                                    @else
                                        <button disabled style="padding: 6px 12px; margin-left: 5px; background-color: #ccc; border: none; border-radius: 4px;">❯</button>
                                    @endif
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <table class="data">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Beach ID</th>
                        <th>Customer Name</th>
                        <th>Customer Phone Number</th>
                        <th>Visit Date</th>
                        <th>Pax</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beachorderweb as $item)
                        <tr>
                            <td>{{ $item->order_code }}</td> 
                            <td>{{ $item->beach_ticket_id }}</td>
                            <td>{{ $item->customer_name }}</td> 
                            <td>{{ $item->customer_phone }}</td> 
                            <td>{{ $item->visit_date }}</td> 
                            <td>{{ $item->quantity }}</td> 
                            <td>
                                <a href="{{ url('/bookingandreservation/beach/'.$item->order_code) }}"><u>See Details</u></a>
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
