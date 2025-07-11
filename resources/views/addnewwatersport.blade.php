<x-layoutinventory>
    <x-slot:title>{{ $title }}</x-slot:title>
    <head>
        <style>
            .form-group {
                color: #7B7B7B;
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
            }

            .form-row {
                display: flex;
                gap: 20px; 
            }

            .form-row .form-group {
                flex: 1; 
            }

            .form-group input,
            .form-group select {
                width: 100%;
                padding: 8px;
                font-size: 14px;
                border: none;
                border-bottom: 2px solid #B0B0B0;
                background: transparent;
                color: #363636;
            }

            .form-group input:focus,
            .form-group select:focus {
                outline: none;
                border-color: #B0B0B0;
                color: #363636;
            }

            .btn-primary,.btn-cancel {
                padding: 10px 20px;
                background-color: #fefefe;
                font-size: 14px;
                font-family: inherit;
                font-weight: bold;
                border-radius: 5px;
                cursor: pointer;
                display: inline-block;
                text-align: center;
                text-decoration: none;
                border: 1px solid #363636;
            }

            .btn-primary {
                color: #FF4E98;
            }

            .btn-primary:hover {
                background-color: #c4ffdc;
                color: rgb(8, 75, 8);
                border: 2px solid rgb(8, 75, 8);
            }

            .btn-cancel {
                color: #FF4E98;
            }

            .btn-cancel:hover {
                background-color: #ffc4c4;
                color: red;
                border: 2px solid red;
            }


            .btn-cancel:hover {
                background-color: #ffc4c4;
                color: red;
                border: 2px solid red;
                text-decoration: none;
            }

            .form-submit-container {
                display: flex;
                justify-content: center;
                margin-top: 50px;
                gap: 15px;
            }
            .settings h1 {
                color: #7b7b7b63;
                font-family::Georgia, 'Times New Roman', Times, serif; 
            }
        </style>
    </head>
    <body>
        <main>
            <div class="settings">
                <h1>Add New Product: Watersport and Landsport Activities</h1> 
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
                <div class="form-group">
                        <label for="note">Note:</label>
                        <input type="text" class="form-control" id="note" name="note">
                    </div>
                    <div class="form-submit-container">
                        <a href="/product/watersport" class="btn-cancel">Cancel Request</a>
                        <button type="submit" class="btn-primary">Add New Product</button>
                    </div>
                    
                </form>
            </div>
            
        </main>
    </body>
</x-layoutinventory>

