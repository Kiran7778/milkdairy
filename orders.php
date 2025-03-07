<?php
include 'config.php';

$result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

echo "<h2>Recent Orders</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Customer</th><th>Milk Type</th><th>Quantity</th><th>Total</th><th>Date</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['customer_name']}</td><td>{$row['milk_type']}</td>
          <td>{$row['quantity']}</td><td>₹{$row['total']}</td><td>{$row['order_date']}</td></tr>";
}

echo "</table>";

$conn->close();
?>
