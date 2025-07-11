<x-layout-sales>
    <head>
        <style>
            table.gbo-visitordetail{
                padding: 15px;
                width: 100%;
                border: 1px solid #000;
                border-radius: 0 8px 8px 8px;
                text-align: left;
                padding-bottom:50px;
            }
            table.gbo-visitordetail th, table.gbo-visitordetail td{
                padding-left: 10px;
                padding-right: 20px;
            }
            table.gbo-visitordetail th{
                padding-top: 25px;
                font-size: 16px;
                background-color: transparent;
                color: #393939;
            }
            table.gbo-visitordetail td{
                background-color:transparent;
                padding-bottom: 25px;
            }
            input[type="text"], input[type="email"], select {
                width: 90%;
                padding: 6px;
                font-size: 14px;
            }
        </style>
    </head>

    <x-slot:title>Edit Visitor Detail | {{ $groupbooking->VisitorDetail->group_name }}</x-slot:title>

    <main>
        <div class="settings">
            <x-navlink-sales />
            <br><br>
            <h2><a href="/bookingandreservation/groupbookingorder">Edit Visitor Detail</a></h2>
            <h2><a href="/bookingandreservation/groupbookingorder">Edit Hotel Detail - {{ $groupbooking->slug }}</a></h2>

            <form method="POST" action="{{ url('/bookingandreservation/groupbookingorder/' . $groupbooking->id . '/visitoredit') }}">
                @csrf
                @method('PUT')

                <table class="gbo-visitordetail">
                    <tbody>
                        <tr>
                            <th>Visitor Name</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>Email</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="visitor_name" value="{{ old('visitor_name', $groupbooking->VisitorDetail->visitor_name) }}" required>
                            </td>
                            <td>
                                <input type="text" name="phone_number" value="{{ old('phone_number', $groupbooking->VisitorDetail->phone_number) }}">
                            </td>
                            <td>
                                <select name="sex">
                                    <option value="">-- Select --</option>
                                    <option value="Male" {{ (old('sex', $groupbooking->VisitorDetail->sex) == 'Male') ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ (old('sex', $groupbooking->VisitorDetail->sex) == 'Female') ? 'selected' : '' }}>Female</option>
                                </select>
                            </td>
                            <td>
                                <input type="email" name="email" value="{{ old('email', $groupbooking->VisitorDetail->email) }}">
                            </td>
                        </tr>

                        <tr>
                            <th>Group Name</th>
                            <th>Company Number</th>
                            <th>Country</th>
                            <th>Group Address</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="group_name" value="{{ old('group_name', $groupbooking->VisitorDetail->group_name) }}">
                            </td>
                            <td>
                                <input type="text" name="company_number" value="{{ old('company_number', $groupbooking->VisitorDetail->company_number) }}">
                            </td>
                            <td>
                                <input type="text" name="country" value="{{ old('country', $groupbooking->VisitorDetail->country) }}">
                            </td>
                            <td>
                                <input type="text" name="group_address" value="{{ old('group_address', $groupbooking->VisitorDetail->group_address) }}">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br><br>
                <div class="buttonedit" style="justify-content: center; align-items: center; display:flex;">
                    <button type="submit" class="styled-button">Save</button>
                </div>
            </form>

        </div>
    </main>
</x-layout-sales>
