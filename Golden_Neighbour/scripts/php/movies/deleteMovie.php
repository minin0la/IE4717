<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$movie_id = $_POST["movie_id"];
$sql = "SELECT * FROM movies WHERE id = $movie_id";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // Movie ID is valid, proceed with deletion
    $delete_sql = "DELETE FROM movies WHERE id = $movie_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting movie: " . $conn->error;
    }
    $delete_sql = "DELETE FROM cart WHERE movie_id = $movie_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting movie: " . $conn->error;
    }
    $delete_sql = "DELETE FROM showtimes WHERE movie_id = $movie_id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: ../../../admin/index.php");
    } else {
        echo "Error deleting movie: " . $conn->error;
    }
} else {
    echo "Invalid movie ID. Please enter a valid ID.";
}

// Close the database connection
$conn->close();
?>