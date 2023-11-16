<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have variables with the data you want to add
$title = mysqli_real_escape_string($conn, $_POST['title']);
$release_date = $_POST['release_date'];
$genre = $_POST['genre'];
$director = mysqli_real_escape_string($conn, $_POST['director']);
$cast = mysqli_real_escape_string($conn, $_POST['cast']);
$movie_description = mysqli_real_escape_string($conn, $_POST['movie_description']);
$runtime_minutes = $_POST['runtime_minutes'];
$rating = $_POST['rating'];
$movie_language = mysqli_real_escape_string($conn, $_POST['movie_language']);
$film_classification = $_POST['film_classification'];
$image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
$trailer_url = mysqli_real_escape_string($conn, $_POST['trailer_url']);
$price = $_POST['price'];


if ($movie_language == "other") {
    $movie_language = $_POST['otherLanguage'];
}
// SQL INSERT statement
$sql = "INSERT INTO movies (title, release_date, genre, director, cast, movie_description, runtime_minutes, rating, movie_language, film_classification, image_url, trailer_url, price) 
        VALUES ('$title', '$release_date', '$genre', '$director', '$cast', '$movie_description', $runtime_minutes, $rating, '$movie_language', '$film_classification', '$image_url','$trailer_url', $price)";

if (mysqli_query($conn, $sql)) {
    echo "Record added successfully";
    header("Location: ../../../admin/index.php");
} else {
    echo "Error adding record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>