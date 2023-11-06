<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, title, release_date, genre, director, cast, movie_description, runtime_minutes, rating, movie_language, flim_classification, assigned_cinema FROM movies";
$result = mysqli_query($conn, $sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

$result_array = $result->fetch_all(MYSQLI_ASSOC);


mysqli_close($conn);
?>