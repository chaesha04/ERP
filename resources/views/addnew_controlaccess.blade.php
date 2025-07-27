@if(session('error'))
    <div style="background-color: #fdd; padding: 10px; margin-bottom: 10px; border: 1px solid #f99;">
        {{ session('error') }}
    </div>
@endif
<x-layout>
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
        <div class="sidebar">
            <a href="/settings" class="{{ request()->is('settings') ? 'active' : '' }}">Profile</a>
            <a href="/controlaccess" class="{{ request()->is('controlaccess*') ? 'active' : '' }}">Control Access</a>
        </div>
        <main>
            <div class="settings">
                <h1>Add New Control Access</h1> 
                <br><br>
                <form action="{{ url('/addnew/controlaccess') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="division">Division:</label>
                            <select class="form-control" name="division" id="division" required>
                                <option value="">-- Select Division --</option>
                                <option value="IT Division">IT Department</option>
                                <option value="Sales Division">Sales Executive</option>
                                <option value="Inventory Division">Inventory Division</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">-- Select Role --</option>
                                <option value="Sales Admin">Sales Admin</option>
                                <option value="Inventory Admin">Inventory Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-submit-container">
                        <a href="/controlaccess" class="btn-cancel">Cancel Request</a>
                        <button type="submit" class="btn-primary">Add New Access</button>
                    </div>
                    
                </form>
            </div>
            
        </main>
    </body>
</x-layout>
