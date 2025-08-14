<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
    <body>
        <main>
            <div class="settings">
                {{-- <h1>Add New Product: Beach</h1> 
                <br><br>
                <form action="{{ url('/product/beach/addnew') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="beach_name">Beach Name:</label>
                            <input type="text" class="form-control" id="beach_name" name="beach_name" required>
                        </div>
                        <div class="form-group">
                            <label for="web_avail">Web Availability:</label>
                            <select class="form-control" name="web_avail" id="web_avail" required>
                                <option value="">-- Availability --</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" min="0" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="hotline">Hotline:</label>
                        <input type="text" class="form-control" id="hotline" name="hotline">
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <input type="text" class="form-control" id="note" name="note">
                    </div>
                    <div class="form-submit-container">
                        <a href="/product/beach" class="btn-cancel">Cancel Request</a>
                        <button type="submit" class="btn-primary">Add New Product</button>
                    </div>
                    
                </form> --}}
                <div class="product-detail" style="border: 1px solid;">
                    <form action="{{ url('product/beach/addnew') }}" method="POST">
                        <table class="header-detail">
                            <tr>
                                <td rowspan="2">
                                    <p><a href="/product/beach">Add New Beach</a></p>
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
                            <label for="beach_name">Beach Name:</label>
                            <input type="text" class="form-control" id="beach_name" name="beach_name" required>
                        </div>
                        <div class="form-group">
                            <label for="web_avail">Web Availability:</label>
                            <select class="form-control" name="web_avail" id="web_avail" required>
                                <option value="">-- Availability --</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" min="0" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="form-group">
                                <label for="hotline">Hotline:</label>
                                <input type="text" class="form-control" id="hotline" name="hotline">
                            </div>
                            <div class="form-group">
                                <label for="note">Note:</label>
                                <input type="text" class="form-control" id="note" name="note">
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </main>
    </body>
</x-layoutinventory>
