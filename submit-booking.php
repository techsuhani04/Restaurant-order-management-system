<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $date    = $_POST['date'];
    $time    = $_POST['time'];
    $message = $_POST['message'];

    $sql = "INSERT INTO bookings (name, email, phone, date, time, message)
            VALUES ('$name', '$email', '$phone', '$date', '$time', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>✅ Booking confirmed!</h3>";
        echo "<p>Thank you, $name. We have reserved your table for $date at $time.</p>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
