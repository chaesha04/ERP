<x-layout-sales>
    <x-slot:title>{{ $title ?? 'Booking Room Summary' }}</x-slot:title>
    <head>
    <style>
        .settings {
            display: flex;          /* bikin container jadi flex */
            flex-direction: row;    /* arah horizontal */
            flex-wrap: wrap;
            justify-content: left; /* tengah-tengah secara horizontal */
            gap: 30px;              /* jarak antar chart */
            padding-left: 30px;
            padding-right: 5px;
        }

        .piechart{
            width: 41%;
            margin-left: 0;         /* hapus margin kiri supaya tidak ada tumpang tindih */
        }

        .linechart {
            width: 50%;             /* beri lebar supaya proporsional */
        }

        .chart{
            width: 100%;            /* biar chart memenuhi div .piechart / .linechart */
            height: 300px;
            border: 1px solid #FF4E98;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Vertikal di tengah */
            align-items: center;     /* Horizontal di tengah */
            text-align: center;
            border-radius: 8px;
        }
        canvas {
            max-width: 100%;
            max-height: 100%;
        }
                        .box-rna-hotel h2{
                    text-align: center;
                    color: white;
                    margin-bottom:45px;
                }
                .box-rna-hotel{
                    background-color: #FF4E98;
                    padding-top: 5px;
                    padding-left: 25px;
                    padding-right: 15px;
                    padding-bottom: 75px;
                    width: 100%;
                }
                .hotel-groupbox-row{
                    background-color: white;
                    padding-left: 15px;
                    padding-right: 15px;
                    margin-top: 30px;
                    border-radius: 8px;
                    display: flex;
                    justify-content: space-between;
                }
                .hotel-groupbox-row:hover{
                    background-color: #dbdbdb;
                    color:#FF4E98;
                    font-weight: bold;
                    padding-left: 15px;
                    padding-right: 15px;
                    margin-top: 15px;
                    border-radius: 8px;
                    display: flex;
                    margin:20px;
                    /* transition-delay: 2ms ease-in-out; */
                }

                .hotel-data{
                    display: flex;
                    text-align: right;
                    align-items:flex-end;
                }


    </style>
    </head>
    <main>
        <div class="settings">
            <div class="piechart">
                <h2 style="color: rgb(2, 2, 97); text-align: center;">Group Booking Favorite: Room Occupancy</h2>
                <div class="chart">
                    <canvas id="roomPieChart" width="300" height="300"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            const ctx = document.getElementById('roomPieChart').getContext('2d');
                            const pieChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: {!! json_encode($labels) !!},
                                    datasets: [{
                                        label: 'Total Room Type',
                                        data: {!! json_encode($data) !!},
                                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                                        borderWidth: 1
                                    }]
                                }
                            });
                        </script>              
                </div>
            </div> 
            <br>
            <div class="linechart">
                <h2 style="color: rgb(2, 2, 97); text-align: center;"><a href="#" style="color: rgb(2, 2, 97);">Booking Trend: Group Booking</a></h2>
                <div class="chart">
                    <canvas id="bookingLineChart" width="500" height="300"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctxLine = document.getElementById('bookingLineChart').getContext('2d');
                    const lineChart = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: {!! json_encode($lineLabels) !!},
                            datasets: [{
                                label: 'Total Room Booked',
                                data: {!! json_encode($lineData) !!},
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 5
                                    }
                                }
                            }
                        }
                    });
                </script>
                </div>
            </div>
            <div class="piechart">
                <div class="box-rna-hotel">
                    <h2>Tanjung Lesung Resort: <br>Group Booking Order</h2>
                    <div class="hotel-groupbox-coloumn">
                        @forelse($hotels as $hotel)
                            <div class="hotel-groupbox-row" onclick="hotelAnalysis({{ $hotel->id }})">
                                <div class="hotel-name"><p>{{ $hotel->hotel_name }}</p></div>
                                <div class="hotel-data">
                                    <p>{{ \App\Models\GroupbookingOrder::where('hotel_id', $hotel->id)->count() }}</p>
                                </div>
                            </div>
                        @empty
                            <p style="color:white;">No hotel data found.</p>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="linechart" style="margin-left:30px;">
                <div class="box-rna-hotel">
                    <h2>Tanjung Lesung Resort: <br>Beach (Website)</h2>
                    <div class="hotel-groupbox-coloumn">
                        @forelse($beachData as $item)
                            <div class="hotel-groupbox-row" onclick="hotelAnalysis({{ $item->id }})">
                                <div class="hotel-name">
                                    <p>
                                        @php
                                            $beachName = 'Unknown';
                                            if ($item->id == 1) {
                                                $beachName = 'Lalassa Beach Club';
                                            } elseif ($item->id == 2) {
                                                $beachName = 'Bodur Beach';
                                            }
                                        @endphp
                                        {{ $beachName }}
                                    </p>
                                </div>
                                <div class="hotel-data">
                                    <p>{{ \App\Models\Booking::where('hotel_id', $item->id)->count() }}</p>
                                </div>
                            </div>
                        @empty
                            <p style="color:white;">No hotel data found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <span></span>
        </div>
    </main>
    <script>
    function hotelAnalysis(id) {
        window.location.href = '/reportingandanalytics/hotel_detail/' + id;
    }
    </script>
</x-layout-sales>
