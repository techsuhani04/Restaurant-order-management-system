<?php
$host = "localhost";       // your server
$user = "root";            // default username in XAMPP
$password = "";            // no password by default in XAMPP
$dbname = "restaurant_db"; // your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Optional: show success
//echo "Connected successfully";
?>
