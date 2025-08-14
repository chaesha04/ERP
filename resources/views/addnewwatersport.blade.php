<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
    <body>
        <main>
            <div class="settings">
                {{-- <h1>Add New Product: Watersport and Landsport Activities</h1> 
                <br><br>
                <form action="{{ url('/product/addnew_activities') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="watersport">Product Name:</label>
                            <input type="text" class="form-control" id="watersport" name="watersport" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" min="0" style="text-align: right;" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <input type="text" class="form-control" id="note" name="note">
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit: </label>
                            <input type="number" class="form-control" id="unit" name="unit" min="0">
                        </div>
                    </div>
                    <div class="form-submit-container">
                        <a href="/product/watersport" class="btn-cancel">Cancel Request</a>
                        <button type="submit" class="btn-primary">Add New Product</button>
                    </div>
                    
                </form> --}}
                <div class="product-detail" style="border: 1px solid;">
                    <form action="{{ url('product/addnew_activities') }}" method="POST">
                        <table class="header-detail">
                            <tr>
                                <td rowspan="2">
                                    <p><a href="/product/beach">Add New Watersport and Activities</a></p>
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
                                <label for="watersport">Product Name:</label>
                                <input type="text" class="form-control" id="watersport" name="watersport" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" min="0" style="text-align: right;" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="note">Note:</label>
                                <input type="text" class="form-control" id="note" name="note">
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit: </label>
                                <input type="number" class="form-control" id="unit" name="unit" min="0">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </main>
    </body>
</x-layoutinventory>

