<x-layout>
    <x-slot:title></x-slot:title>
    <body>
        <div class="sidebar">
            <a href="/settings">Profile</a>
            <a href="/controlaccess">Control Access</a>
        </div>
        <main>
            <div class="settings">
                <button class="styled-button" onclick="editEmployee({{ $controlaccess->id }})">Edit</button>
                <button class="styled-button" onclick="deleteEmployee({{ $controlaccess->id }})">Delete</button>
                <br><br>
                <table class="data">
                    <thead class="table-dark">
                        <tr>
                            <th>Employee Name</th>
                            <th>Division</th>
                            <th>Role</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $controlaccess->name }}</td>
                                <td>{{ $controlaccess->division }}</td> 
                                <td>{{ $controlaccess->role }}</td> 
                                <td>{{ $controlaccess->email }}</td> 
                            </tr>
                    </tbody>
                </table>
                <br>
                <a href="/controlaccess" class="back-button"><u>← Back to List  </u></a>
            </div>
        </main>

    <script>
        function deleteEmployee(id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                fetch('/controlaccess/' + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        alert('Employee deleted successfully!');
                        window.location.href = '/controlaccess'; 
                    } else {
                        alert('Failed to delete employee.');
                    }
                });
            }
        }
        function editEmployee(id) {
            window.location.href = '/controlaccess/' + id + '/edit';
        }

    </script>

</x-layout>
