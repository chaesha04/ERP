<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <div class="data" style="margin-bottom: 70px">
                <table class="data">
                    <thead>
                        <tr>
                            <td colspan="5" style="text-align: left; font-size: 40px; background-color: transparent;">[{{ $seedetail->id }}] - {{ $seedetail->first_name }} {{ $seedetail->last_name }}  </td>
                        </tr>
                        <tr>
                        <td colspan="5" style="text-align: left;background-color: transparent;">
                            <div class="form-customer">
                                    <button onclick="Cancel({{ $seedetail->id }})">Cancel</button>
                                    {{-- <button onclick="editProductAccommodation({{ $seedetail->id }})">Edit Product</button>
                                    <button onclick="deleteProductAccommodation({{ $seedetail->id }})">Delete Product</button> --}}
                                </a>
                            </div>
                        </td>

                        </tr>
                        <tr>
                            <th style="background-color:pink;">Hotel ID</th>
                            <th style="background-color:pink;">Room ID</th>
                            <th style="background-color:pink;">Check In</th>
                            <th style="background-color:pink;">Check Out</th>
                            <th style="background-color:pink;">Night</th>
                            <th style="background-color:pink;">Pax</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $seedetail->id }}</td>
                            <td>{{ $seedetail->rooms_id }}</td>
                            <td>{{ $seedetail->check_in }}</td>
                            <td>{{ $seedetail->check_out }}</td>
                            <td>{{ $seedetail->adults }} Adults and {{ $seedetail->child }} Children</td>
                            <td>{{ $seedetail->total_night }} Night</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-data" style="border: 2px solid rgb(155, 155, 155); padding: 10px; border-radius:5px;">
                {{-- <table class="data" style="margin-top:20px;">
                    <thead class="table-dark">
                        <tr>
                            <th colspan="6">CHECK IN & CHECK OUT</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Check Box</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Check In</td>
                            <td>
                                <input type="checkbox" id="checkin-box" onclick="handleCheck('check_in', {{ $seedetail->id }})">
                            </td>
                            <td id="check_in-time"></td>
                        </tr>
                        <tr>
                            <td>Check Out</td>
                            <td>
                                <input type="checkbox" id="checkout-box" onclick="handleCheck('check_out', {{ $seedetail->id }})">
                            </td>
                            <td id="check_out-time"></td>
                        </tr>
                    </tbody>
                </table> --}}
                <table style="width: 100%; margin-top:20px;">
                    <tr>
                        <td>
                            <table class="data">
                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="6">VISTIOR DETAIL</th>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Additional Request</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $seedetail->first_name }}</td>
                                    <td>{{ $seedetail->last_name }}</td>
                                    <td>{{ $seedetail->phone }}</td>
                                    <td>{{ $seedetail->email }}</td>
                                    <td>{{ $seedetail->country }}</td>
                                    <td>{{ $seedetail->additional_request }}</td>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <table class="data">
                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="6">PAYMENT METHOD DETAIL</th>
                                    </tr>
                                    <tr>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $seedetail->total_amount }}</td>
                                    <td>{{ $seedetail->payment_method }}</td>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</x-layout-sales>

<script>
    function Cancel(id){
        window.location.href = '/bookingandreservation/accommodation';
    } 
</script>
