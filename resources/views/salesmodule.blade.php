<x-layout-sales>
    <x-slot:title>{{ $title }}</x-slot:title>
    <style>
        
        table{
            color: white;
        }
        table td, th{
            padding: 10px;
            background: #FF4E98;
            border: 1px solid #FF4E98;
            text-align: center;
        }
        table th{
            text-transform:capitalize;
        }
        table th select{
            padding: 5px;
            border: 1px solid black;
            border-radius: 8px;
        }
    </style>
    <main>
        <div class="settings">
            <div class="greetings">
                <p id="greeting"></p>
                <p id="datetime"></p>
            <script>
                function updateDateTime() {
                    const now = new Date();

                    // Greeting logic
                    const hour = now.getHours();
                    let greetingText = "Hello";

                    if (hour >= 5 && hour < 12) {
                        greetingText = "Good Morning";
                    } else if (hour >= 12 && hour < 17) {
                        greetingText = "Good Afternoon";
                    } else if (hour >= 17 && hour < 21) {
                        greetingText = "Good Evening";
                    } else {
                        greetingText = "Good Night";
                    }

                    // Set greeting
                    document.getElementById('greeting').innerText = `${greetingText}, Sales Team!`;

                    // Format date & time
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    const date = now.toLocaleDateString('id-ID', options);
                    const time = now.toLocaleTimeString('id-ID').replace(/\./g, ':');
                    document.getElementById('datetime').innerText = `${date} | ${time}`;
                }

                setInterval(updateDateTime, 1000);
                updateDateTime(); // initial call
            </script>
            </div>
            <br>
            <div class="linechart">
                <table>
                    <tr></tr>
                </table>
            </div>
            <div class="piechart">
                <div class="chart">
                    <div class="table-rna">
                        <table>
                            <tr>
                                <th colspan="4">tanjung lesung beach hotel: group booking 
                                    <select name="" id="">
                                        <option value="" id="thisYear">This Year</option>
                                        <option value="" id="thisMonth">This Month</option>
                                    </select>
                                </th>
                            </tr>
                            </tr>
                            <tr>
                                <td style="width:25%;">KV</td>
                                <td style="width:25%;">LBV</td>
                                <td style="width:25%;">LLS</td>
                                <td style="width:25%;">TJBH</td>
                            </tr>
                            <tr>
                                <td>{{ $orders->where('hotel_id', '4')->count() }}</td>
                                <td>{{ $orders->where('hotel_id', '2')->count() }}</td>
                                <td>{{ $orders->where('hotel_id', '3')->count() }}</td>
                                <td>{{ $orders->where('hotel_id', '1')->count() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-sales>
