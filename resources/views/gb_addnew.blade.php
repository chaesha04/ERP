    <x-layout-sales>
        <x-slot:title>Add New | Group Booking (Step 2)</x-slot:title>
        <main>
<style>
    input {
        justify-content: right;
        align-items: left;
        display: flex;
    }

    input[type="number"] {
        text-align: right;
        width:90%;
        color:#414141;
    }

    input[type="date"],
    input[type="number"],
    input[type="text"],
    select {
        padding: 8px 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        width: 100%;
        box-sizing: border-box;
        font-size: 14px;
        transition: border 0.2s ease;
    }

    input[type="date"]:focus,
    input[type="number"]:focus,
    input[type="text"]:focus,
    select:focus {
        outline: none;
        border-color: #007BFF;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    label {
        font-weight: 500;
        margin-bottom: 4px;
        display: block;
        font-size: 13px;
        color: #333;
    }

    .form-group {
        margin-bottom: 12px;
    }

    table {
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th {
        background-color: #f5f5f5;
        text-align: left;
        padding: 10px;
    }

    td {
        padding: 10px;
    }

    .styled-button {
        background-color: #28a745;
        color: white;
        padding: 10px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .styled-button:hover {
        background-color: #218838;
    }

    .form-submit-container {
        margin-top: 20px;
    }
</style>

            <div class="settings">
                <table class="header">
                    <tr>
                        <td rowspan="2"><p>Add New : Group Booking: Step 2 (Purchase Data)</p></td>
                        <td colspan="1"></td>
                    </tr>
                </table>
                <br>
                <p>Group Name: {{ $visitor->group_name }}</p>
                <p>Contact Person: {{ $visitor->visitor_name }}</p>

                <form method="POST" action="/groupbooking/step2">
                    @csrf
                    <input type="hidden" name="visitor_id" value="{{ $visitor->id }}">
                    
                    <div class="form-row">     
                        <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">                      
                            <tr>
                                <th colspan>Hotel Name</th>
                                <th colspan>Sales Name</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Room Qty</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select name="hotel_id" required>
                                            <option value="">-- Choose Hotel --</option>
                                            @foreach($hotels as $hotel)
                                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>        
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select name="sales_id" id="sales_id">
                                            <option value="">-- Choose Sales --</option>
                                            @foreach($sales_id as $sales)
                                                <option value="{{ $sales->id }}">{{ $sales->name }}</option>
                                            @endforeach  
                                        </select>                                  
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" name="check_in" value="">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" name="check_out" value="">
                                    </div>       
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="qty_room" value="0">
                                    </div>
                                </td>
                            </tr>

                            <!-- Baris tambahan: Event Type, Night, Rate -->
                            <tr>
                                <th>Event Type</th>
                                <th>Night</th>
                                <th>Rate</th>
                                <th>Package</th>
                                <th>Extra Bed Qty</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="event_type" value="gathering/holiday..">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="night" id="night" readonly>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="rate_desc">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="package" style="width: 100%;">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="extrabed">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>

                    <div class="form-row">
                        <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">                        
                            <tr>
                                <th colspan="3">Pax</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Adult</label>
                                        <input type="number" min="0" value="0" name="adult" id="adult">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Child</label>
                                        <input type="number" min="0" value="0" name="child" id="child">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Baby</label>
                                        <input type="number" min="0" value="0" name="baby">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                    <td colspan="2"><label>Total Pax (Adult + Child + Baby)</label></td>
                                    <td><input type="number" name="pax" id="pax" readonly></td>
                            </tr>

                        </table>
                    </div>
                    <br>            
                    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
                        <tr>
                            <th colspan="2">Pax /Room Type</th>
                            <th colspan="1">Price</th>
                            <th colspan="1">Total</th>
                        </tr>
                        <tr>
                            <td><label for="single_room">Single Room Pax</label></td>
                            <td><input type="number" name="single_room" id="single_room"></td>
                            <td><input type="number" name="singleroom_price" id="singleroom_price"></td>
                            <td><input type="number" id="single_total" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="twin_room">Twin Room Pax</label></td>
                            <td><input type="number" name="twin_room" id="twin_room"></td>
                            <td><input type="number" name="twinroom_price" id="twinroom_price"></td>
                            <td><input type="number" id="twin_total" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="triple_room">Triple Room Pax</label></td>
                            <td><input type="number" name="triple_room" id="triple_room"></td>
                            <td><input type="number" name="tripleroom_price" id="tripleroom_price"></td>
                            <td><input type="number" id="triple_total" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="child_room">Child Room</label></td>
                            <td><input type="number" name="child_room" id="child_room"></td>
                            <td><input type="number" name="childroom_price" id="childroom_price"></td>
                            <td><input type="number" id="child_total" readonly></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: right; text-transform:uppercase; font-weight: bold;">TOTAL</td>
                            <td>
                                <input type="number" name="grand_total" id="grand_total" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: right; text-transform:uppercase; font-weight: bold;">Deposit</td>
                            <td>
                                <input type="number" name="deposit" id="deposit">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: right; text-transform:uppercase; font-weight: bold;">Balance</td>
                            <td>
                                <input type="number" id="balance" readonly>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="form-submit-container" style="justify-content: center; align-items: center; display: flex;">
                        <button type="submit" class="styled-button">Add New Group Booking</button>
                    </div><br>
                    <script>
                        function formatRupiah(number) {
                            return number.toLocaleString('id-ID');
                        }

                        function calculatePax() {
                            const adult = parseInt(document.getElementById('adult').value) || 0;
                            const child = parseInt(document.getElementById('child').value) || 0;
                            document.getElementById('pax').value = adult + child;
                        }

                        document.getElementById('adult').addEventListener('input', calculatePax);
                        document.getElementById('child').addEventListener('input', calculatePax);

                        window.addEventListener('DOMContentLoaded', calculatePax);

                    function calculateNight() {
                        const checkIn = new Date(document.querySelector('[name="check_in"]').value);
                        const checkOut = new Date(document.querySelector('[name="check_out"]').value);

                        if (!isNaN(checkIn.getTime()) && !isNaN(checkOut.getTime())) {
                            const timeDiff = checkOut - checkIn;
                            const nights = Math.max(1, Math.ceil(timeDiff / (1000 * 60 * 60 * 24)));
                            document.getElementById('night').value = nights;
                            calculateProductTotal(); // Update total kamar juga
                        } else {
                            document.getElementById('night').value = 0;
                        }
                    }

                    function calculateProductTotal() {
                        const night = parseInt(document.getElementById('night').value) || 0;

                        const calc = (qtyId, priceId, totalId) => {
                            const qty = parseInt(document.getElementById(qtyId).value) || 0;
                            const price = parseInt(document.getElementById(priceId).value) || 0;
                            const total = qty * price * night;
                            document.getElementById(totalId).value = total;
                        };

                        calc('single_room', 'singleroom_price', 'single_total');
                        calc('twin_room', 'twinroom_price', 'twin_total');
                        calc('triple_room', 'tripleroom_price', 'triple_total');
                        calc('child_room', 'childroom_price', 'child_total');
                    }

                    document.querySelector('[name="check_in"]').addEventListener('change', calculateNight);
                    document.querySelector('[name="check_out"]').addEventListener('change', calculateNight);

                    ['single_room', 'singleroom_price', 'twin_room', 'twinroom_price',
                    'triple_room', 'tripleroom_price', 'child_room', 'childroom_price']
                    .forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.addEventListener('input', calculateProductTotal);
                    });

                        window.addEventListener('DOMContentLoaded', () => {
                            calculateNight();
                            calculateProductTotal();
                        });

                        function calculateGrandTotal() {
                        const totals = [
                            'single_total',
                            'twin_total',
                            'triple_total',
                            'child_total'
                        ].map(id => parseInt(document.getElementById(id).value) || 0);

                        const grandTotal = totals.reduce((sum, val) => sum + val, 0);
                        document.getElementById('grand_total').value = grandTotal;

                        const deposit = parseInt(document.getElementById('deposit').value) || 0;
                        document.getElementById('balance').value = grandTotal - deposit;
                    }

                    document.getElementById('deposit').addEventListener('input', calculateGrandTotal);

                    function calculateProductTotal() {
                        const night = parseInt(document.getElementById('night').value) || 0;

                        const calc = (qtyId, priceId, totalId) => {
                            const qty = parseInt(document.getElementById(qtyId).value) || 0;
                            const price = parseInt(document.getElementById(priceId).value) || 0;
                            const total = qty * price * night;
                            document.getElementById(totalId).value = total;
                        };

                        calc('single_room', 'singleroom_price', 'single_total');
                        calc('twin_room', 'twinroom_price', 'twin_total');
                        calc('triple_room', 'tripleroom_price', 'triple_total');
                        calc('child_room', 'childroom_price', 'child_total');

                        calculateGrandTotal();
                    }

                </script>

                </form>

            </div>
        </main>
    </x-layout-sales>


