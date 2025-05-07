<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["customer_name"];
    $items = $_POST["items"];
    $total = $_POST["total"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO orders (customer_name, items, total, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssdi", $name, $items, $total, $quantity);
        if ($stmt->execute()) {
            echo "<h3>✅ Order placed successfully!</h3>";
            echo "<p>Thank you, $name. Quantity: $quantity | Total: ₹$total</p>";
        } else {
            echo "❌ Error saving order: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ DB error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "❌ Invalid request.";
}
?>
