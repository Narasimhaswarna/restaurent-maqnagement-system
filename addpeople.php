<?php
// Assuming you already have a DB connection in db.php
include 'connectdb.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $subject  = mysqli_real_escape_string($conn, $_POST['subject']);
    $mobile   = mysqli_real_escape_string($conn, $_POST['mobile']);
    $message  = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert query
    $sql = "INSERT INTO INFO (fullname, email, subject, mobile, message) 
            VALUES ('$fullname', '$email', '$subject', '$mobile', '$message')";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Your message has been submitted successfully!'); window.location.href='contact.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
