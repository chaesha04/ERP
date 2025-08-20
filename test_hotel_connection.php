<?php
require_once 'hotel_connection.php';

echo "<h2>Test Koneksi Database Hotel</h2>";

try {
    $hotelDB = new HotelDatabase();
    echo "✅ Koneksi berhasil!<br>";
    
    // Test ambil data untuk accommodation
    $bookings = $hotelDB->getBookingsForAccommodation();
    echo "✅ Berhasil ambil data accommodation: " . count($bookings) . " bookings<br>";
    
    if (count($bookings) > 0) {
        echo "<br><strong>Sample data booking pertama:</strong><br>";
        echo "Booking Code: " . $bookings[0]['booking_code'] . "<br>";
        echo "Hotel ID: " . $bookings[0]['hotel_id'] . "<br>";
        echo "Customer: " . $bookings[0]['customer_name'] . "<br>";
        echo "Check-in: " . $bookings[0]['check_in'] . "<br>";
        echo "Check-out: " . $bookings[0]['check_out'] . "<br>";
        echo "Total Guests: " . $bookings[0]['total_guests'] . "<br>";
        echo "Status: " . $bookings[0]['status'] . "<br>";
    }
    
    $hotelDB->closeConnection();
    echo "<br>🎉 <strong>Data siap untuk ditampilkan di accommodation page!</strong>";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>