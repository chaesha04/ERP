<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <body>
        <div class="sidebar">
            <a href="/settings" class="{{ request()->is('settings') ? 'active' : '' }}">Profile</a>
            <a href="/controlaccess" class="{{ request()->is('controlaccess*') ? 'active' : '' }}">Control Access</a>
        </div>
        <main>
            <div class="settings">
                <a href="/addnew/controlaccess">
                    <button class="styled-button">Add New Access</button>
                    <br><br>
                </a> 
                    <table class="data">
                        <thead class="table-dark">
                            <tr>
                                <th>Employee Name</th>
                                <th>Division</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Control Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($controlaccess as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->division }}</td> 
                                    <td>{{ $item->role }}</td> 
                                    <td>{{ $item->email }}</td> 
                                    <td>
                                        <a href="{{ url('/controlaccess/'.$item->id) }}">See Details</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
            </div>
        </main>


</x-layout>