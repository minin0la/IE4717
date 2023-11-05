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

$sql = "SELECT id, title, release_date, genre, director, cast, movie_description, runtime_minutes, rating, movie_language, flim_classification FROM movies";
$result = mysqli_query($conn, $sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

$movie_array = $result->fetch_all(MYSQLI_ASSOC);


mysqli_close($conn);


$assigned_theaters = array_column($showtime_array, 'theater_id');
$total_theaters = range(1, 5); // Assuming there are 5 theaters in total

$unassigned_theaters = array_diff($total_theaters, $assigned_theaters);

if (!empty($unassigned_theaters)) {
    echo "<script>console.log('The following theater_id(s) are unassigned: " . implode(", ", $unassigned_theaters) . "')</script>";

} else {
    echo "All theater_ids are assigned.";
}


?>