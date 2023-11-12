<?php
$email = $_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT booking_id, theater_id, movie_title, selected_seat, email, movie_date, movie_time, qty, price  FROM transactions WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

$transaction_array = $result->fetch_all(MYSQLI_ASSOC);


mysqli_close($conn);
?>