<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <head>
        <style>
            .settings table.data{
                width:100%;
                border:1px solid #c9c9c950;
            }
            .settings table.data th{
                background-color: #D8D8D8;
                font-size: 14px;
                color: #393939;
            }
            .settings table.data td{
                font-size: 13px;
                text-align: center;
                background-color: #c9c9c950;
            }

            .styled-button {
                border: 1px solid #000;  
                background-color: white;  
                color: black; 
                padding: 10px 10px; 
                text-decoration: none;  
                font-family: sans-serif; 
                font-size: 13px; 
                border-radius: 8px; 
                display: inline-block; 
                transition: background-color 0.3s ease, color 0.3s ease; 
            }

            .styled-button:hover {
                background-color: #FF4E98; 
                color: white;  
            }

            table.navlinkgbo td {
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                padding: 5px 10px;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }

            table.navlinkgbo td a {
                text-decoration: none;
                color: black;
            }

            table.navlinkgbo td.active {
                background-color: navy;
            }

            table.navlinkgbo td.active a {
                color: white;
            }

            table.gbo-detail{
                padding: 15px;
                width: 100%;
                border: 1px solid #000;
                align-content: center;
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;
            }
            table.gbo-detail th{
                font-size: 16px;
                background-color: #D8D8D8;
                color: #393939;
            }
            table.gbo-detail td{
                background-color:#c9c9c950;
                border: 1px solid #c9c9c950;
            }
            
            table.gbo-detail td.price{
                padding: 5px;
                text-align: right;
            }

            </style>
    <x-slot:title>{{ $title }}</x-slot:title>
    </head>
    <body>
        <main>
            <div class="sidebar">            
                <a href="/salesmodule" class="{{ request()->is('salesmodule*') ? 'active' : '' }}">Dashboard</a>
                <a href="/bookingandreservation/groupbookingorder" class="{{ request()->is('bookingandreservation*') ? 'active' : '' }}">Booking and Reservation</a>
                <a href="/reportingandanalytics" class="{{ request()->is('reportingandanalytics*') ? 'active' : '' }}">Reporting and Analytics</a>
                <a href="/visitor" class="{{ request()->is('visitor*') ? 'active' : '' }}">Customer Data</a>
            </div>

            {{ $slot }}
        </main>
</x-layout>