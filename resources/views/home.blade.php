<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <head>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>


        <style>
            .box-container {
                display: flex;
                list-style: none;   
                padding: 0;
                justify-content: center;
                flex-direction: column;
            }
            .box-container li {
                justify-content: center;
                align-content: center;
                vertical-align: center;
                margin: 0;
            }
            .sidebar {
                position: fixed;
                top: 60px;
                left: 0px;
                width: 200px; 
                height: 100vh;
                background-color: #f7f7f7;
                padding-top: 20px; 
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                display: flex;
                flex-direction: column;
                align-items: center;
        }

            .box {
                width: 153px;
                height: 119px;
                background-color: #FF4E98;
                border: 1px solid #ccc;
                display: flex;
                align-items: flex-end;     
                justify-content: center;
                padding-bottom: 20px;
                font-family: sans-serif;
                text-align: center;
                border-radius: 8px;
                transition: all 0.3s ease;
                margin-bottom: 20px;
            }

            .box:hover {
                background-color: #ffffff;
                border-color: #FF4E98;
                color: #FF4E98;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            }

            .dashboard-box a {
                text-decoration: none;
                color: rgb(255, 255, 255);
                font-weight: bold;
                transition: color 0.3s ease;
            }

            .box:hover a {
                color: #FF4E98;
            }

            #calendar {
                width: 100%;
                margin: 50px auto;
                background-color: white;
                padding: 60px;
                border-radius: 12px;
                position: relative;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                
            }   
        </style>
    </head>

    <main>
        <div class="dashboard-box">
            <div class="sidebar">
                <ul class="box-container">
                    <li>
                        <a href="/salesmodule" class="box">Sales Module</a>
                    </li>
                    <li>
                        <a href="/product/accommodation" class="box">Inventory Module</a>
                    </li>
                    <li>
                        <a href="/settings" class="box">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="settings">

            <div id='calendar'></div>
        </div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto',
            events: @json($events)
        });

        calendar.render();
    });
</script>

    </main>
</x-layout>
