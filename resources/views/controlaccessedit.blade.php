<x-layout>
    <x-slot:title></x-slot:title>
    <head>
    </head>
    <body>
        <div class="sidebar">
            <a href="/settings" class="{{ request()->is('settings') ? 'active' : '' }}">Profile</a>
            <a href="/controlaccess" class="{{ request()->is('controlaccess*') ? 'active' : '' }}">Control Access</a>
        </div>
        <main>
            <div class="settings">
                <a href="/controlaccess"><h1>Edit Employee Data - {{ $controlaccess->name }}</h1></a>
                <br>
                    <form action="{{ url('/controlaccess/' . $controlaccess->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">  
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $controlaccess->name) }}">
                        
                            <label for="division">Division</label>
                            <input type="text" name="division" id="division" value="{{ old('division', $controlaccess->division) }}">
                            
                            <label for="role">Role</label>
                            <input type="text" name="role" id="role" value="{{ old('role', $controlaccess->role) }}">

                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $controlaccess->email) }}">

                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="">
                        </div>
                    </div>
                        
                    <br><br>
                    <div class="form-submit">
                        <button type="submit" class="styled-button">Update</button>
                    </div>
                    <br><br><a href="/controlaccess" class="back-button"><u>← Back to List  </u></a>
                    
                </form>
            </div>

</x-layout>