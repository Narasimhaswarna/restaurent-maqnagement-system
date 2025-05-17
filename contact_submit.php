<?php
include 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (name, email, subject, mobile, message) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $subject, $mobile, $message);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Thank you! We have received your message and will get back to you soon."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Sorry, there was an error sending your message."]);
    }

    $stmt->close();
    $conn->close();
}
?>