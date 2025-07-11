<x-layout-sales>
    <x-slot:title>Edit Hotel Detail | {{ $groupbooking->VisitorDetail->group_name }}</x-slot:title>

    <style>
        button.button-edit {
            background-color: white;
            color: black;
            border: none;
            padding: 1px 2px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        input[type="number"].input-full {
            width: 100%;
            text-align: right;
            box-sizing: border-box;
        }
    </style>

    <main>
        <div class="settings">
            <x-navlink-sales></x-navlink-sales>
            <br><br>
            <h2><a href="/bookingandreservation/groupbookingorder">Edit Hotel Detail - {{ $groupbooking->slug }}</a></h2>
            <form method="POST" action="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id . '/edit') }}">
                @csrf
                @method('PUT')
                <table class="gbo-detail">
                    <tbody>
                        <tr>
                            <th colspan="7" style="background-color:rgb(176, 225, 176); color: black;">
                                Edit: Hotel Detail ({{$groupbooking->VisitorDetail->group_name}})
                            </th>
                        </tr>
                        <tr>
                            <td style="width:25%">Hotel Name</td>
                            <td style="width:15%">Package Type</td>
                            <td style="width:15%">Check In</td>
                            <td style="width:15%">Check Out</td>
                            <td style="width:10%">Adult</td>
                            <td style="width:10%">Child</td>
                            <td style="width:10%">Baby</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="package" value="{{ $groupbooking->ProductDetail->hotel_name }}" class="input-full">
                            </td>
                            <td>
                                <input type="text" name="package" value="{{ $groupbooking->package }}" class="input-full">
                            </td>
                            <td>
                                <input type="date" name="check_in" value="{{ $groupbooking->check_in }}" class="input-full">
                            </td>
                            <td>
                                <input type="date" name="check_out" value="{{ $groupbooking->check_out }}" class="input-full">
                            </td>
                            <td>
                                <input type="number" name="adult" value="{{ $groupbooking->adult }}" class="input-full">
                            </td>
                            <td>
                                <input type="number" name="child" value="{{ $groupbooking->child }}" class="input-full">
                            </td>
                            <td>
                                <input type="number" name="baby" value="{{ $groupbooking->baby }}" class="input-full">
                            </td>
                        </tr>
                    </table>
                    <table class="gbo-detail">
                        <tr>
                            <th style="background-color:rgb(176, 225, 176); color: black;" colspan="4">Edit: Product of Hotel Detail (Langkah Lestari)</th>    
                        </tr>        

                        <tr>
                            <th style="background-color:rgb(176, 225, 176); color: black;">Product</th>
                            <th style="background-color:rgb(176, 225, 176); color: black;">Price</th>
                            <th style="background-color:rgb(176, 225, 176); color: black;">Unit</th>
                            <th style="background-color:rgb(176, 225, 176); color: black;">Night</th>
                        </tr>

                        {{-- Single --}}
                        <tr>
                            <td style="width:30%">Single Occp.</td>
                            <td style="width:25%" class="td-left">
                                <input type="number" name="singleroom_price" value="{{ $groupbooking->singleroom_price }}" class="input-full price">
                            </td>
                            <td style="width:25%" class="td-left">
                                <input type="number" name="single_room" value="{{ $groupbooking->single_room }}" class="input-full unit">
                            </td>
                            <td style="width:25%" class="td-left">
                                <input type="number" name="night" value="{{ $groupbooking->night }}" class="input-full" id="night" readonly>
                            </td>
                        </tr>

                        {{-- Twin --}}
                        <tr>
                            <td>Twin Share Occp.</td>
                            <td class="td-left">
                                <input type="number" name="twinroom_price" value="{{ $groupbooking->twinroom_price }}" class="input-full price">
                            </td>
                            <td class="td-left">
                                <input type="number" name="twin_room" value="{{ $groupbooking->twin_room }}" class="input-full unit">
                            </td>
                            <td class="td-left">
                                <input type="number" value="{{ $groupbooking->night }}" class="input-full" readonly>
                            </td>
                        </tr>

                        {{-- Triple --}}
                        <tr>
                            <td>Triple Share Occp.</td>
                            <td class="td-left">
                                <input type="number" name="tripleroom_price" value="{{ $groupbooking->tripleroom_price }}" class="input-full price">
                            </td>
                            <td class="td-left">
                                <input type="number" name="triple_room" value="{{ $groupbooking->triple_room }}" class="input-full unit">
                            </td>
                            <td class="td-left">
                                <input type="number" value="{{ $groupbooking->night }}" class="input-full" readonly>
                            </td>
                        </tr>

                        {{-- Children --}}
                        <tr>
                            <td>Children</td>
                            <td class="td-left">
                                <input type="number" name="childroom_price" value="{{ $groupbooking->childroom_price }}" class="input-full price">
                            </td>
                            <td class="td-left">
                                <input type="number" name="child_room" value="{{ $groupbooking->child_room }}" class="input-full unit">
                            </td>
                            <td class="td-left">
                                <input type="number" value="{{ $groupbooking->night }}" class="input-full" readonly>
                            </td>
                        </tr>

                        {{-- Deposit --}}
                        <tr>
                            <td colspan="3">Deposit</td>
                            <td class="td-left">
                                <input type="number" name="deposit" value="{{ $groupbooking->deposit }}" class="input-full" id="deposit">
                            </td>
                        </tr>

                        {{-- Grand Total --}}
                        <tr>
                            <td colspan="3">Grand Total</td>
                            <td class="td-left">
                                <input type="number" name="grand_total" value="0" class="input-full" id="grand_total" readonly>
                            </td>
                        </tr>

                        {{-- Submit --}}
                        <tr>
                            <td colspan="4" style="text-align: center;">
                                <button type="submit" class="styled-button">Save Changes</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </main>

    <script>
        function calculateGrandTotal() {
            let grandTotal = 0;

            const nightInput = document.getElementById('night');
            const night = Number(nightInput?.value) || 1;

            const deposit = Number(document.getElementById('deposit')?.value) || 0;

            const priceInputs = document.querySelectorAll('input.price');
            const unitInputs = document.querySelectorAll('input.unit');

            priceInputs.forEach((priceInput, index) => {
                const price = Number(priceInput.value) || 0;
                const unit = Number(unitInputs[index]?.value) || 0;
                grandTotal += price * unit * night;
            });

            grandTotal += deposit;

            const grandTotalInput = document.getElementById('grand_total');
            grandTotalInput.value = grandTotal.toFixed(0);
        }

        document.querySelectorAll('input.price, input.unit, #deposit').forEach(input => {
            input.addEventListener('input', calculateGrandTotal);
        });

        window.addEventListener('DOMContentLoaded', calculateGrandTotal);
    </script>
</x-layout-sales>
