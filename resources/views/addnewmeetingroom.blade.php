<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
    <body>
        <main>
            <div class="settings">
                {{-- <h1>Add New Product: Meeting Room</h1> 
                <br><br>
                <form action="{{ url('/product/addnew_meetingroom') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="meetingroom_name">Meeting Room Name:</label>
                            <input type="text" class="form-control" id="meetingroom_name" name="meetingroom_name" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <input type="text" class="form-control" id="note" name="note">
                        </div>
                        <div class="form-group">
                        <label for="hotline">Hotline:</label>
                        <input type="text" class="form-control" id="hotline" name="hotline">
                        </div>
                    </div>

                    <div class="form-submit-container">
                        <a href="/product/meetingroom" class="btn-cancel">Cancel Request</a>
                        <button type="submit" class="btn-primary">Add New Product</button>
                    </div>
                    
                </form> --}}

                <div class="product-detail" style="border: 1px solid;">
                    <form action="{{ url('product/addnew_meetingroom') }}" method="POST">
                        <table class="header-detail">
                            <tr>
                                <td rowspan="2">
                                    <p><a href="/product/meetingroom">Add New Meetingroom</a></p>
                                </td>
                                <td colspan="2"></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>
                                    <a href="#"><button type="button" onclick="history.back()">Cancel</button></a>
                                    <a href="#"><button type="submit">Add New</button></a>
                                </td>
                            </tr>
                        </table>
                        <div class="form-edit" style="padding:20px;">
                        @csrf
                        @method('POST')
                        <div class="form-row">
                            <div class="form-group">
                                <label for="meetingroom_name">Meeting Room Name:</label>
                                <input type="text" class="form-control" id="meetingroom_name" name="meetingroom_name" required>
                            </div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="note">Note:</label>
                                <input type="text" class="form-control" id="note" name="note">
                            </div>
                            <div class="form-group">
                            <label for="hotline">Hotline:</label>
                            <input type="text" class="form-control" id="hotline" name="hotline">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </main>
    </body>
</x-layoutinventory>
