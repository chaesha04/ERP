<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <head>
        <style>
            .settings strong {
                color: #888888; /* Warna abu-abu */
                font-weight: normal; /* Menghilangkan tebal font */
            }

            .sidebar {
                margin-bottom: 20px;
            }

            .sidebar a {
                display: inline-block;
                margin-right: 10px;
                padding: 6px 12px;
                text-decoration: none;
                background-color: #f5f5f5;
                color: #333;
                border-radius: 4px;
            }

            .sidebar a.active {
                background-color: #ccc;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        @php
            $user = auth('employee')->user();
        @endphp

        <div class="sidebar">
            <a href="/settings" class="{{ request()->is('settings') ? 'active' : '' }}">Profile</a>

            @if ($user && $user->role === 'Super Admin')
                <a href="/controlaccess" class="{{ request()->is('controlaccess*') ? 'active' : '' }}">Control Access</a>
            @endif
        </div>

        <main>
            <div class="settings">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px;">
                            <strong>Name</strong><br>
                            {{ $user->name }}
                        </td>
                        <td style="padding: 8px;">
                            <strong>Email</strong><br>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">
                            <strong>Division</strong><br>
                            {{ $user->division }}
                        </td>
                        <td style="padding: 8px;">
                            <strong>Password</strong><br>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px;">
                            <strong>Role</strong><br>
                            {{ $user->role }}
                        </td>
                    </tr>
                </table>
            </div>
        </main>
    </body>
</x-layout>
