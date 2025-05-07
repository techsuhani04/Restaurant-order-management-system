<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $comments = $_POST["comments"];

    // Prepare the SQL statement
    $sql = "INSERT INTO feedback (name, rating, comments) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sis", $name, $rating, $comments);

        if ($stmt->execute()) {
            echo "<h3>Thank you for your feedback, $name!</h3>";
        } else {
            echo "Error saving feedback: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>