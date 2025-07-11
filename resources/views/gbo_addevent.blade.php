<x-layout-sales>
    <x-slot:title>Group Booking Detail | {{ $groupbooking->VisitorDetail->group_name }}</x-slot:title>

    <main>
        <div class="settings">
            <x-navlink-sales />
            <br><br>
            <table>
                <tr>
                    <td>Group Booking ID</td>
                    <td>:</td>
                    <td>{{ $groupbooking->id }}</td>
                </tr>
                <tr>
                    <td>Group/Company Name</td>
                    <td>:</td>
                    <td>{{ $groupbooking->VisitorDetail->group_name }}</td>
                </tr>
                <tr>
                    <td>Check In - Check Out</td>
                    <td>:</td>
                    <td>{{ $groupbooking->check_in }} - {{ $groupbooking->check_out }}</td>
                </tr>
            </table>
            <br>
            <form action="{{ route('eventbeo.store', ['id' => $groupbooking->id]) }}" method="POST">
                @csrf

                <div style="overflow-x: auto;">
                    <table id="activity-table" style="width: 100%; border-collapse: collapse; font-size: 14px; border: 1px solid #ccc;">
                        <thead style="background: #f0f0f0;">
                            <tr>
                                <th style="padding: 10px; border: 1px solid #ccc;">Date</th>
                                <th style="padding: 10px; border: 1px solid #ccc;">Start</th>
                                <th style="padding: 10px; border: 1px solid #ccc;">End</th>
                                <th style="padding: 10px; border: 1px solid #ccc;">Activity</th>
                                <th style="padding: 10px; border: 1px solid #ccc;">Place</th>
                                <th style="padding: 10px; border: 1px solid #ccc;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="activity-body">
                            <tr>
                                <td style="border: 1px solid #ccc;">
                                    <input type="date" name="activities[0][date]" required style="width: 90%; padding: 6px; border: none;">
                                </td>
                                <td style="border: 1px solid #ccc;">
                                    <input type="time" name="activities[0][start]" required style="width: 90%; padding: 6px; border: none;">
                                </td>
                                <td style="border: 1px solid #ccc;">
                                    <input type="time" name="activities[0][end]" required style="width: 90%; padding: 6px; border: none;">
                                </td>
                                <td style="border: 1px solid #ccc;">
                                    <input type="text" name="activities[0][activities]" required style="width: 90%; padding: 6px; border: none;">
                                </td>
                                <td style="border: 1px solid #ccc;">
                                    <input type="text" name="activities[0][place]" required style="width: 90%; padding: 6px; border: none;">
                                </td>
                                <input type="hidden" name="activities[0][gb_id]" value="{{ $groupbooking->id }}">
                                <td style="border: 1px solid #ccc; text-align: center;">
                                    <button type="button" onclick="removeRow(this)" style="color:red; border: none; background: none; cursor: pointer;">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 8px; display: flex; align-items: center;">
                    <button type="button" onclick="addRow()" style="padding: 6px 12px; background: #ccc; border: none; border-radius: 4px;">➕ Add Row</button>
                </div>

                <div style="margin-top: 40px; text-align: center;">
                    <button type="submit" style="padding: 10px 28px; background: #FF4E98; color: white; border: none; border-radius: 6px; font-size: 16px;">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        let index = 1;
        const groupBookingId = "{{ $groupbooking->id }}";

        function addRow() {
            const tbody = document.getElementById('activity-body');
            const row = document.createElement('tr');

            row.innerHTML = `
                <td style="border: 1px solid #ccc;"><input type="date" name="activities[${index}][date]" required style="width: 90%; padding: 6px; border: none;"></td>
                <td style="border: 1px solid #ccc;"><input type="time" name="activities[${index}][start]" required style="width: 90%; padding: 6px; border: none;"></td>
                <td style="border: 1px solid #ccc;"><input type="time" name="activities[${index}][end]" required style="width: 90%; padding: 6px; border: none;"></td>
                <td style="border: 1px solid #ccc;"><input type="text" name="activities[${index}][activities]" required style="width: 90%; padding: 6px; border: none;"></td>
                <td style="border: 1px solid #ccc;"><input type="text" name="activities[${index}][place]" required style="width: 90%; padding: 6px; border: none;"></td>
                <input type="hidden" name="activities[${index}][gb_id]" value="${groupBookingId}">
                <td style="border: 1px solid #ccc; text-align: center;">
                    <button type="button" onclick="removeRow(this)" style="color:red; border: none; background: none; cursor: pointer;">Delete</button>
                </td>
            `;

            tbody.appendChild(row);
            index++;
        }

        function removeRow(button) {
            button.closest('tr').remove();
        }
    </script>
</x-layout-sales>
