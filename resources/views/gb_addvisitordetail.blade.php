<x-layout-sales>
    <x-slot:title>Add New | Group Booking (Step 1)</x-slot:title>
    <main>
        <div class="settings"> 
            <table class="header">
                <tr>
                    <td rowspan="2"><p>Add New : Group Booking: Step 1 (Visitor Data)</p></td>
                    <td colspan="1"></td>
                </tr>
            </table>
            <br><br>
            <form method="POST" action="/groupbooking/step1">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>PIC Name</label>
                        <input type="text" name="visitor_name" required>
                    </div>
                    <div class="form-group">
                        <label>Group Name</label>
                        <input type="text" name="group_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label>Company Number</label>
                        <input type="text" name="company_number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="sex" id="">
                            <option value="">--Select Gender--</option>
                            <option value="F">Female</option>
                            <option value="M">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Company Address</label>
                        <input type="text" name="group_address" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" >
                    </div>
                </div>
                <br>
                <div class="form-submit-center" style="justify-content: center; align-items: center; display: flex;">
                    <button type="submit" class="styled-button">Next: Add New Group Booking</button>
                </div>
            </form>

        </div>
    </main>
</x-layout-sales>