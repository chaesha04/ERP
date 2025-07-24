<x-layout-sales>
    <x-slot:title>{{ $title ?? 'Booking Room Summary' }}</x-slot:title>

    <head>
        <style>
            .settings {
                display: flex;
                flex-direction: column;
                gap: 30px;
                padding-left: 30px;
                padding-right: 5px;
            }

            .chart-section {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 30px;
                justify-content: space-between;
                width: 98%;
                margin: 0;
            }

            .piechart, .linechart {
                width: 48%;
            }

            .chart {
                width: 100%;
                height: 300px;
                border: 1px solid #FF4E98;
                padding: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                border-radius: 8px;
            }

            canvas {
                max-width: 100%;
                max-height: 100%;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <main>
        <div class="settings">
            <h1 onclick="rna()" style="padding-top: 10px;">{{ $hotel->hotel_name }}</h1>
            <hr style="border: none; border-top: 2px solid #a3a3a3; width: 100%; margin: 0; padding: 0;">
            <p style="color: #a3a3a3; margin: 0; padding: 0;">All Total</p>
            <table class="data" >
                <tr>
                    <th>Product</th>
                    <th>Total Pax</th>
                    <th>Revenue</th>
                </tr>
                <tr>
                    <td>Single Room</td>
                    <td>{{ $totalSingleRoom }}</td>
                    <td style="text-align: right;">Rp{{ number_format($totalSingleRoomCost, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Twin Room</td>
                    <td>{{ $totalTwinRoom }}</td>
                    <td style="text-align: right;">Rp{{ number_format($totalTwinRoomCost, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Triple Room</td>
                    <td>{{ $totalTripleRoom }}</td>
                    <td style="text-align: right;">Rp{{ number_format($totalTripleRoomCost, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Child Room</td>
                    <td>{{ $totalChildRoom }}</td>
                    <td style="text-align: right;">Rp{{ number_format($totalChildRoomCost, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">TOTAL</td>
                    <td style="font-weight: bold;">{{ $totalRoom }}</td>
                    <td style="font-weight: bold; text-align: right;">Rp{{ number_format($grandTotal, 0, ',', '.') }}</td>
                </tr>

                @if($orders->isEmpty())
                    <tr>
                        <td colspan="3">No data found.</td>
                    </tr>
                @endif
            </table>

            <!-- Charts Section -->
            <div class="chart-section">
                <!-- Pie Chart -->
                <div class="piechart">
                    <h2 style="color: rgb(2, 2, 97); text-align: center;">Group Booking Favorite: Room Occupancy</h2>
                    <div class="chart">
                        <canvas id="roomPieChart" width="300" height="300"></canvas>
                    </div>
                </div>

                <!-- Line Chart -->
                {{-- <div class="linechart">
                    <h2 style="color: rgb(2, 2, 97); text-align: center;">Booking Trend: Monthly Room Booking #revisi</h2>
                    <div class="chart">
                        <canvas id="bookingLineChart" width="500" height="300"></canvas>
                    </div>
                </div> --}}
            </div>
        </div>

<script>
    function rna() {
        window.location.href = '/reportingandanalytics';
    }

    // PIE CHART - FIXED ✅
    const ctx = document.getElementById('roomPieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                data: {!! json_encode($data) !!},
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                borderWidth: 1
            }]
        }
    });

    // LINE CHART - FIXED ✅
    const ctxLine = document.getElementById('bookingLineChart').getContext('2d');
    const lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: {!! json_encode($lineLabels ?? ['Jan', 'Feb', 'Mar', 'Apr']) !!},
            datasets: [{
                label: 'Total Room Booked',
                data: {!! json_encode($lineData ?? [0, 50, 100, 70]) !!},
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
                        stepSize: 10
                    }
                }
            }
        }
    });
</script>

    </main>
</x-layout-sales>
