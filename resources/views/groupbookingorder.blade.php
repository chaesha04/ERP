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
            </table><br>
            <div class="form-customer">
                <table style="width:100%">
                    <tr>
                        <td style="width: 50%">
                            <form method="GET" action="/bookingandreservation/groupbookingorder">
                                <select name="field">
                                    <option value="hotel_name" {{ request('field') == 'hotel_name' ? 'selected' : '' }}>Hotel Name</option>
                                    <option value="group_name" {{ request('field') == 'group_name' ? 'selected' : '' }}>Group Name</option>
                                    <option value="sales_name" {{ request('field') == 'sales_name' ? 'selected' : '' }}>Sales Name</option>
                                    <option value="id" {{ request('field') == 'id' ? 'selected' : '' }}>Booking ID</option>
                                </select>

                                <input type="text" name="keyword" placeholder="Search Group Booking" value="{{ request('keyword') }}">
                                <button type="submits">Search</button>
                                <button><a href="/bookingandreservation/groupbookingorder">Cancel</a></button>
                            </form>
                        </td>
                        <td>
                            <p style="text-align:right; color: #6e6e6e;">{{ $groupbookings->count() }} Visitor Data | Page {{ $groupbookings->currentPage() }} of {{ $groupbookings->lastPage() }}</p>
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