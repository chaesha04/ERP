<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales> 
            <br>
            <table class="header">
                <tr>
                    <td rowspan="2"><p>Group Booking List</p></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td style="text-decoration: none;"><button class="styled-button" onclick="addNew()">Add New</button></a></td>
                    <script>
                        function addNew(){
                            window.location.href = '/bookingandreservation/addnew_groupbooking/step1';
                        }
                    </script>
                </tr>
            </table
            >
            <div class="form-customer">
                <table style="width:100%">
                    <tr>
                        <td style="width: 50%">
                            <form method="GET" action="/bookingandreservation/groupbookingorder">
                                <select name="field">
                                    <option value="hotel_name" {{ request('field') == 'hotel_name' ? 'selected' : '' }}>Hotel Name</option>
                                    <option value="group_name" {{ request('field') == 'group_name' ? 'selected' : '' }}>Group Name</option>
                                    <option value="sales_name" {{ request('field') == 'sales_name' ? 'selected' : '' }}>Sales Name</option>
                                    <option value="slug" {{ request('field') == 'slug' ? 'selected' : '' }}>Booking ID</option>
                                </select>

                                <input type="text" name="keyword" placeholder="Search Group Booking" value="{{ request('keyword') }}">
                                <button type="submits">Search</button>
                                <button><a href="/bookingandreservation/groupbookingorder">Cancel</a></button>
                            </form>
                        </td>
                         <td>
                            <p style="text-align:right; color: #6e6e6e; margin-bottom: 0;">{{ $groupbookings->count() }} Reservation Via Website Data | Page {{ $groupbookings->currentPage() }} of {{ $groupbookings->lastPage() }}</p>
                            <div class="" style="text-align: right;">
                                    @if ($groupbookings->onFirstPage())
                                        <button disabled style="padding: 6px 12px; margin-right: 5px; background-color: #ccc; border: none; border-radius: 4px;">❮</button>
                                    @else
                                        <a href="{{ $groupbookings->appends(request()->query())->previousPageUrl() }}">
                                            <button style="padding: 6px 12px; margin-right: 5px; background-color: #ff79b1; color: white; border: none; border-radius: 4px;">❮</button>
                                        </a>
                                    @endif

                                    @if ($groupbookings->hasMorePages())
                                        <a href="{{ $groupbookings->appends(request()->query())->nextPageUrl() }}">
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
                        <th>Booking ID</th>
                        <th>Hotel Name</th>
                        <th>Pax</th>
                        <th>Group Name</th>
                        <th>Sales PIC</th>
                        <th>See Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groupbookings as $item)
                        <tr>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->ProductDetail->hotel_name }}</td> 
                            <td>{{ ($item->adult)+($item->child)+($item->baby) }}</td> 
                            <td>{{ $item->VisitorDetail->group_name }}</td> 
                            <td>{{ $item->SalesDetail->name }}</td> 
                            <td>
                                <a href="{{ url('/bookingandreservation/groupbookingorder/'.$item->id) }}"><u>See Details</u></a>
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