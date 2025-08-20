<?php

// hotel_connection.php

class HotelDatabase {

    private $host = '192.168.1.17'; // IP komputer hotel - SESUAIKAN!

    private $username = 'erp_user';

    private $password = 'U*s.MlxJH@]6qh1r';

    private $database = 'hotels'; // SESUAIKAN dengan nama database hotel!

    private $conn;

    

   public function __construct() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    
    // Ambil data booking untuk accommodation page
    public function getBookingsForAccommodation() {
        $sql = "SELECT 
                    id,
                    code as booking_code,
                    hotel_id,
                    CONCAT(first_name, ' ', last_name) as customer_name,
                    first_name,
                    last_name,
                    check_in,
                    check_out,
                    adults,
                    child,
                    (adults + child) as total_guests,
                    total_amount,
                    payment_status,
                    status,
                    phone,
                    email,
                    room_type_name,
                    total_night
                FROM bookings 
                ORDER BY id DESC";
        
        $result = $this->conn->query($sql);
        
        if (!$result) {
            throw new Exception("Query failed: " . $this->conn->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Ambil detail booking berdasarkan ID
    public function getBookingDetails($id) {
        $sql = "SELECT * FROM bookings WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    // Ambil booking hari ini
    public function getTodayBookings() {
        $sql = "SELECT 
                    id,
                    code as booking_code,
                    hotel_id,
                    CONCAT(first_name, ' ', last_name) as customer_name,
                    check_in,
                    check_out,
                    (adults + child) as total_guests,
                    total_amount,
                    status
                FROM bookings 
                WHERE DATE(check_in) = CURDATE()
                ORDER BY id DESC";
        
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Test koneksi
    public function getAllBookings() {
        $sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 10";
        $result = $this->conn->query($sql);
        
        if (!$result) {
            throw new Exception("Query failed: " . $this->conn->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function closeConnection() {
        $this->conn->close();
    }
}
?>