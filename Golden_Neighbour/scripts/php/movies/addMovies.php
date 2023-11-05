<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have variables with the data you want to add
$title = $_POST['title'];
$director = $_POST['director'];
$cast = $_POST['cast'];
$runtime_minutes = $_POST['runtime_minutes'];
$release_date = $_POST['release_date'];
$genre = $_POST['genre'];
$movie_description = $_POST['movie_description'];
$rating = $_POST['rating'];
$flim_classification = $_POST['flim_classification'];
$movie_language = $_POST['movie_language'];

if ($movie_language == "other") {
    $movie_language = $_POST['otherLanguage'];
}
// SQL INSERT statement
$sql = "INSERT INTO movies (title, release_date, genre, director, cast, movie_description, runtime_minutes, rating, movie_language, flim_classification) 
        VALUES ('$title', '$release_date', '$genre', '$director', '$cast', '$movie_description', $runtime_minutes, $rating, '$movie_language', '$flim_classification')";

if (mysqli_query($conn, $sql)) {
    echo "Record added successfully";
    header("Location: ../../../admin/index.php");
} else {
    echo "Error adding record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>