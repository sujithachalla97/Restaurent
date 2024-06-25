<?php
$conn = new mysqli("localhost", "root", "", "restaurant");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $sql = "INSERT INTO menu_items (name, price, description) VALUES ('$name', '$price', '$description')";

  if ($conn->query($sql) === TRUE) {
    echo "New menu item added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<form method="post" action="">
  Name: <input type="text" name="name"><br>
  Price: <input type="text" name="price"><br>
  Description: <textarea name="description"></textarea><br>
  <input type="submit" value="Add Menu Item">
</form>
