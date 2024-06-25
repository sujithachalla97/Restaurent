<?php
$conn = new mysqli("localhost", "root", "", "restaurant");

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Order ID: " . $row["order_id"] . " - Customer: " . $row["customer_name"] . " - Status: " . $row["status"] . "<br>";
    echo '<form method="post" action="update_order.php">
            <input type="hidden" name="order_id" value="' . $row["order_id"] . '">
            <select name="status">
              <option
    echo '<form method="post" action="update_order.php">
            <input type="hidden" name="order_id" value="' . $row["order_id"] . '">
            <select name="status">
              <option value="Pending" ' . ($row["status"] == "Pending" ? "selected" : "") . '>Pending</option>
              <option value="Confirmed" ' . ($row["status"] == "Confirmed" ? "selected" : "") . '>Confirmed</option>
              <option value="Completed" ' . ($row["status"] == "Completed" ? "selected" : "") . '>Completed</option>
            </select>
            <input type="submit" value="Update Status">
          </form>';
  }
} else {
  echo "No orders found";
}

$conn->close();
?>
