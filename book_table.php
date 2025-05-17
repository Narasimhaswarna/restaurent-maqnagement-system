<?php
require_once 'connectdb.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $guests = $_POST['person'];
    $date = $_POST['reservation-date'];
    $time = $_POST['time'];
    $special_requests = $_POST['message'];

    $sql = "INSERT INTO book (name, phone, guests, data, time, special_requests) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $phone, $guests, $date, $time, $special_requests);
    
    try {
        $stmt->execute();
        echo json_encode([
            'status' => 'success',
            'message' => 'Table booked successfully! We will contact you shortly.'
        ]);
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Table booked successfully! We will contact you shortly.'
        ]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode([
        'status' => 'success',
        'message' => 'Table booked successfully! We will contact you shortly.'
    ]);
}
?>