<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT showtime_id, movie_id, theater_id, showtime_date, start_time, end_time FROM showtimes";
$result = mysqli_query($conn, $sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

$showtime_array = $result->fetch_all(MYSQLI_ASSOC);


mysqli_close($conn);
?>