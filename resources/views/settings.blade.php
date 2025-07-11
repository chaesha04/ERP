<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <head>
        <style>
            .settings strong {
                color: #888888; /* Warna abu-abu */
                font-weight: normal; /* Menghilangkan tebal font */
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
                <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px;">
                        <strong>Name</strong><br>
                        {{ auth()->user()->name }}
                    </td>
                    <td style="padding: 8px;">
                        <strong>Email</strong><br>
                        {{ auth()->user()->email }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px;">
                        <strong>Division</strong><br>
                        {{ auth()->user()->division }}
                    </td>
                    <td style="padding: 8px;">
                        <strong>Password</strong><br>
                        ******** {{-- Jangan tampilkan password asli, ini dummy --}}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px;">
                        <strong>Role</strong><br>
                        {{ auth()->user()->role }}
                    </td>
                    <td></td>
                </tr>
                </table>
            </div>
        </main>
    </body>
</x-layout>
