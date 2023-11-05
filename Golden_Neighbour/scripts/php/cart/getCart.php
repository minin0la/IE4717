<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT cart_id, selected_seat, theater_id, email, movie_title, movie_date, movie_time, qty, price FROM cart";
$result = mysqli_query($conn, $sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

$cart_array = $result->fetch_all(MYSQLI_ASSOC);


mysqli_close($conn);
?>