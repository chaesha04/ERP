<x-layout-sales>
    <x-slot:title>Add New | Group Booking (Step 2)</x-slot:title>
    <main>
        <style>
            textarea {
                padding-bottom: 50px;
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 15px;
                border-radius: 6px;
                border: 1px solid #ccc;
                width: 100%;
                box-sizing: border-box;
                font-size: 14px;
                transition: border 0.2s ease;
                vertical-align: top;
                resize: vertical;
            }

            textarea:focus {
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
                width: 100%;
            }

            th {
                background-color: #f5f5f5;
                text-align: center;
                padding: 10px;
            }

            td {
                padding: 10px;
            }

            .styled-button {
                padding: 5px;
                font-weight: bold;
            }

            .styled-button:hover {
                background-color: #d4e9ff;
                color: black;
                padding: 5px;
                font-weight: bold;
            }

            .submit {
                margin-top: 20px;
            }
        </style>

        <div class="settings">
            <table style="width:fit-content;">
                <tr>
                    <td>Group Booking ID</td>
                    <td>:</td>
                    <td>{{ $groupbooking->slug }}</td>
                </tr>
                <tr>
                    <td>Group/Company Name</td>
                    <td>:</td>
                    <td>{{ $groupbooking->VisitorDetail->group_name }}</td>
                </tr>
                <tr>
                    <td>Check In - Check Out</td>
                    <td>:</td>
                    <td>{{ $groupbooking->check_in }} until {{ $groupbooking->check_out }}</td>
                </tr>
            </table>

            <form action="{{ url()->current() }}" method="POST">

                @csrf
                <input type="hidden" name="gb_id" value="{{ $groupbooking->id }}">

                <!-- Note Section -->
                <table style="border: 1px solid #333;">
                    <tr>
                        <th colspan="4" style="background-color: #d4e9ff; color: black; border: 1px solid #333;">NOTE FOR STAFF AND TEAM</th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #333;">Housekeeping</th>
                        <th style="border: 1px solid #333;">Engineer</th>
                        <th style="border: 1px solid #333;">Kitchen</th>
                        <th style="border: 1px solid #333;">FnB</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_housekeeping" id="note_housekeeping" rows="3">{{ $noteBEO->note_housekeeping ?? '' }}</textarea>
                        </td>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_engineer" id="note_engineer" rows="3">{{ $noteBEO->note_engineer ?? '' }}</textarea>
                        </td>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_kitchen" id="note_kitchen" rows="3">{{ $noteBEO->note_kitchen ?? '' }}</textarea>
                        </td>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_fnb" id="note_fnb" rows="3">{{ $noteBEO->note_fnb ?? '' }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #333;">Sport</th>
                        <th style="border: 1px solid #333;">Accounting</th>
                        <th style="border: 1px solid #333;">Lalassa</th>
                        <th style="border: 1px solid #333;"></th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_sport" id="note_sport" rows="3">{{ $noteBEO->note_sport ?? '' }}</textarea>
                        </td>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_accounting" id="note_accounting" rows="3">{{ $noteBEO->note_accounting ?? '' }}</textarea>
                        </td>
                        <td style="border: 1px solid #333;">
                            <textarea required name="note_lalassa" id="note_lalassa" rows="3">{{ $noteBEO->note_lalassa ?? '' }}</textarea>
                        </td>
                        <td style="border: 1px solid #333;"></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="submit" style="display:flex; justify-content:center; align-items: center; gap: 10px;">
                                <button type="button" onclick="window.history.back()" class="styled-button" style="padding: 10px; cursor: pointer;">Cancel</button>
                                <button type="submit" class="styled-button" style="padding: 10px; cursor: pointer;">Submit</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <br>
            </form>
        </div>
    </main>
</x-layout-sales>
