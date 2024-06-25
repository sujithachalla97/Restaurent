<?php
$conn = new mysqli("localhost", "root", "", "restaurant");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $_POST['customer_name'];
  $items = $_POST['items']; // Assume this is an array of menu_item_id and quantity pairs

  $sql = "INSERT INTO orders (customer_name, status) VALUES ('$customer_name', 'Pending')";

  if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;
    foreach ($items as $item) {
      $menu_item_id = $item['menu_item_id'];
      $quantity = $item['quantity'];
      $order_item_sql = "INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES ('$order_id', '$menu_item_id', '$quantity')";
      $conn->query($order_item_sql);
    }
    echo "Order placed successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<form method="post" action="">
  Customer Name: <input type="text" name="customer_name"><br>
  <!-- Add form inputs for order items -->
  <input type="submit" value="Place Order">
</form>
