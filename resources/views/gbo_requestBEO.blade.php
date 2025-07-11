<x-layout-sales>
    <x-slot:title>Add New | Group Booking (Step 2)</x-slot:title>
    <main>
        <style>
            input {
                display: flex;
                justify-content: right;
                align-items: left;
                vertical-align: top;
            }
            
            /* input[type="time"] {
                text-align: right;
                width: 90%;
                color: #414141;
                } */
                /* 
                input[type="date"],
                input[type="time"], */
                input[type="text"],
                select {
                    padding: 50px 10px;
                    border-radius: 6px;
                    border: 1px solid #ccc;
                    width: 100%;
                    box-sizing: border-box;
                    font-size: 14px;
                    transition: border 0.2s ease;
                    vertical-align: top;
                }
                
                input:focus,
                select:focus {
                    vertical-align: top;
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

            .styled-button{
                padding:5px;
            }            
            .styled-button:hover{
                background-color:rgb(176, 225, 176);
                color:black;
                padding:5px;
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

            <form action="" method="POST">
                @csrf
                <input type="hidden" name="gb_id" value="{{ $groupbooking->id }}">
                
                <!-- Note Section -->
                <table>
                    <tr>
                        <th colspan="4" style="background-color:rgb(176, 225, 176); color: black;">NOTE FOR STAFF AND TEAM</th>
                    </tr>
                    <tr>
                        <th>Housekeeping</th>
                        <th>Engineer</th>
                        <th>Accounting</th>
                        <th>Kitchen</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="note_housekeeping" id="note_housekeeping" required></td>
                        <td><input type="text" name="note_engineer" id="note_engineer" required></td>
                        <td><input type="text" name="note_accounting" id="note_accounting" required></td>
                        <td><input type="text" name="note_kitchen" id="note_kitchen" required></td>                    
                    </tr>
                    <tr>
                        <th>Sport</th>
                        <th>FnB</th>
                        <th>Lalassa</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input required type="text" name="note_sport" id="note_sport"></td>
                        <td><input required type="text" name="note_fnb" id="note_fnb"></td>
                        <td><input required type="text" name="note_lalassa" id="note_lalassa"></td>
                        <td></td>
                    </tr>
                </table>
                <br>


                <!-- Submit -->
                <div class="submit" style="display:flex; justify-content:center; align-items: center;">
                    <button type="submit" class="styled-button" style="padding: 10px;">Submit</button>
                </div>
            </form>
        </div>
    </main>
</x-layout-sales>

