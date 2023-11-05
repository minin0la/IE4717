<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$cart_id = $_POST['cart_id'];
$sql = "DELETE FROM cart WHERE cart_id = $cart_id";
$result = mysqli_query($conn, $sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

header("Location: ../../../cart/index.php");
mysqli_close($conn);
?>