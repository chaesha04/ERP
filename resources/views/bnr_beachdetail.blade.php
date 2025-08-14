<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="settings">
            <div class="data" style="margin-bottom: 70px">
                <table class="data">
                    <thead>
                        <tr>
                            <td colspan="5" style="text-align: left; font-size: 40px; background-color: transparent;">[{{ $seedetail->order_code }}] - {{ $seedetail->customer_name }} </td>
                        </tr>
                        <tr>
                        <td colspan="5" style="text-align: left;background-color: transparent;">
                            <div class="form-customer">
                                    <button onclick="window.history.back()">Cancel</button>
                                    {{-- <button onclick="editProductAccommodation({{ $seedetail->id }})">Edit Product</button>
                                    <button onclick="deleteProductAccommodation({{ $seedetail->id }})">Delete Product</button> --}}
                                </a>
                            </div>
                        </td>

                        </tr>
                        <tr>
                            <th style="background-color:pink;">Booking ID</th>
                            <th style="background-color:pink;">Beach ID</th>
                            <th style="background-color:pink;">Customer Name</th>
                            <th style="background-color:pink;">Visit Date</th>
                            <th style="background-color:pink;">Ticket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $seedetail->order_code }}</td>
                            <td>{{ $seedetail->beach_ticket_id }}</td>
                            <td>{{ $seedetail->customer_name }}</td>
                            <td>{{ $seedetail->visit_date }}</td>
                            <td>{{ $seedetail->quantity }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-data" style="border: 2px solid rgb(155, 155, 155); padding: 10px; border-radius:5px;">
                <table class="data" style="margin-top:20px;">
                    <thead class="table-dark">
                        <tr>
                            <th colspan="6">CUSTOMER DATA</th>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Customer Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $seedetail->customer_name }}</td>
                            <td>{{ $seedetail->customer_phone }}</td>
                            <td>{{ $seedetail->customer_email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-data" style="border: 2px solid rgb(155, 155, 155); padding: 10px; border-radius:5px;">
                <table class="data" style="margin-top:20px;">
                    <thead class="table-dark">
                        <tr>
                            <th colspan="6">PAYMENT DATA</th>
                        </tr>
                        <tr>
                            <th>Total Ticket</th>
                            <th>Additional Request</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $seedetail->quantity }}</td>
                            <td>{{ $seedetail->additional_request }}</td>
                            <td>{{ $seedetail->total_price }}</td>
                            <td>{{ $seedetail->payment_method }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-layout-sales>

<script>
    function handleCheck(type, bookingId) {
    const checkbox = document.getElementById(`${type}-box`);
    const timeCell = document.getElementById(`${type}-time`);

    if (checkbox.checked) {
        const now = new Date();
        const iso = now.toISOString();
        const local = now.toLocaleString();

        timeCell.innerText = local;

        fetch("/bookingandreservation/accommodation/statusfrontoffice/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                booking_id: bookingId,
                [type]: iso
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data.message);
        })
        .catch(error => {
            alert("Gagal menyimpan status: " + error);
        });
    } else {
        timeCell.innerText = ''; // hapus waktu di tampilan kalau uncheck
    }
}
</script>
