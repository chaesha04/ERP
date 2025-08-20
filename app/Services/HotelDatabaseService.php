<?php

namespace App\Services;

use mysqli;
use Exception;

class HotelDatabaseService
{
    private $host = '192.168.1.17'; // IP komputer hotel (azmi)
    private $username = 'erp_user';
    private $password = 'U*s.MlxJH@]6qh1r';
    private $database = 'hotels'; // Nama database hotel
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            throw new Exception("Hotel DB Error: " . $e->getMessage());
        }
    }

    public function getBookingsForAccommodation()
    {
        $sql = "SELECT 
                    id,
                    code as booking_code,
                    hotel_id,
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
                    total_night,
                    created_at
                FROM bookings 
                ORDER BY created_at DESC";
        
        $result = $this->conn->query($sql);
        
        if (!$result) {
            throw new Exception("Query failed: " . $this->conn->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBookingDetails($id)
    {
        $sql = "SELECT * FROM bookings WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function closeConnection()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    public function getBeachTicketsfromDatabase()
    {
        $sql = "SELECT 
                    id,
                    beach_ticket_id,
                    order_code,
                    customer_name,
                    customer_email,
                    customer_phone,
                    cashier_id,
                    visit_date,
                    quantity,
                    additional_request,
                    subtotal,
                    discount,
                    promo_code_id,
                    total_price,
                    amount_tendered,
                    payment_method,
                    payment_status,
                    transaction_id,
                    paid_at,
                    is_offline_order,
                    created_at
                FROM ticket_orders
                ORDER BY created_at DESC";
        
        $result = $this->conn->query($sql);
        
        if (!$result) {
            throw new Exception("Query failed: " . $this->conn->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTicketOrder($id)
    {
        $sql = "SELECT * FROM ticket_orders WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

}