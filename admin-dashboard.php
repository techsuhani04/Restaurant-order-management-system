<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 50px;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    h2 {
      margin-top: 40px;
      color: #c0392b;
    }
  </style>
</head>
<body>

  <h1>📋 Admin Dashboard</h1>

  <h2>🧾 Orders</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Customer</th>
      <th>Items</th>
      <th>Quantity</th>
      <th>Total (₹)</th>
      <th>Ordered At</th>
    </tr>
    <?php
    $order_sql = "SELECT * FROM orders";
    $order_result = mysqli_query($conn, $order_sql);

    while ($row = mysqli_fetch_assoc($order_result)) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['customer_name']}</td>
              <td>{$row['items']}</td>
              <td>{$row['quantity']}</td>
              <td>{$row['total']}</td>
              <td>{$row['created_at']}</td>
            </tr>";
    }
    ?>
  </table>

  <h2>📅 Bookings</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Time</th>
      <th>Message</th>
    </tr>
    <?php
    $booking_sql = "SELECT * FROM bookings";
    $booking_result = mysqli_query($conn, $booking_sql);

    while ($row = mysqli_fetch_assoc($booking_result)) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['date']}</td>
              <td>{$row['time']}</td>
              <td>{$row['message']}</td>
            </tr>";
    }
    ?>
  </table>
  
  <h2>💬 Feedback</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Rating</th>
      <th>Comments</th>
    </tr>
    <?php
    $feedback_sql = "SELECT * FROM feedback ORDER BY id DESC";
    $feedback_result = mysqli_query($conn, $feedback_sql);

    while ($row = mysqli_fetch_assoc($feedback_result)) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['rating']}/5</td>
              <td>{$row['comments']}</td>
            </tr>";
    }
    ?>
  </table>

</body>
</html>
