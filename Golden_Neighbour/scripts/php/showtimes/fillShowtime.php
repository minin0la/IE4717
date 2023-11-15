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



$assigning_theaters = $_POST['venue'];
$assigning_movie_id = $_POST['movie_id'];
$assigning_movie_title = mysqli_real_escape_string($conn, $_POST['movie_title']);
$assigning_runtime_minutes = $_POST['runtime_minutes'];
$assigning_date = $_POST['showtime_date'];
$assigning_date_count = $_POST['showtime_date_count'];
$assigned_theaters = array_column($showtime_array, 'theater_id');
$total_theaters = range(1, 5);

$unassigned_theaters = array_diff($total_theaters, $assigned_theaters);

if (!empty($unassigned_theaters)) {
    echo "<script>console.log('The following theater_id(s) are unassigned: " . implode(", ", $unassigned_theaters) . "')</script>";

} else {
    echo "All theater_ids are assigned.";
}
// echo '<script>console.log(' . $assigning_theaters . ')</script>';
// echo '<script>console.log(' . $assigning_movie_id . ')</script>';
// echo '<script>console.log(' . $assigning_runtime_minutes . ')</script>';
// echo '<script>console.log(' . $assigning_date . ')</script>';
// echo '<script>console.log(' . $assigned_theaters . ')</script>';
if ($assigning_theaters == "None") {
    $sql = "DELETE FROM showtimes WHERE movie_id = $assigning_movie_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $sql = "UPDATE movies SET assigned_cinema = NULL WHERE id = $assigning_movie_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $sql = "DELETE FROM cart WHERE movie_id = $assigning_movie_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }


} else {

    if (!in_array($assigning_theaters, $assigned_theaters)) {
        date_default_timezone_set('Asia/Singapore');
        $opening_time = date_create('10:00:00');
        $closing_time = date_create('22:00:00');

        $diff = date_diff($opening_time, $closing_time);
        $available_time = ($diff->h * 60) + $diff->i;

        // Calculate how many times the movie can be shown
        $showings = floor($available_time / $assigning_runtime_minutes);
        for ($day_offset = 0; $day_offset < $assigning_date_count; ) {
            $assigning_date = date('Y-m-d', strtotime("+$day_offset days"));
            echo "$assigning_date\n";



            for ($i = 0; $i < $showings; $i++) {
                $start_time = date_format(date_add($opening_time, date_interval_create_from_date_string($i * $assigning_runtime_minutes . ' minutes')), 'H:i:s');
                $end_time = date_format(date_add($opening_time, date_interval_create_from_date_string(($i + 1) * $assigning_runtime_minutes . ' minutes')), 'H:i:s');
                //     $sql = "INSERT INTO showtimes (movie_id, theater_id, showtime_date, start_time, end_time)
                // VALUES 
                //     ('$assigning_movie_id', '$assigning_theaters', '$assigning_date', '$start_time', '$end_time'))";
                //     $result = mysqli_query($conn, $sql);
                if ($start_time <= '22:00:00' and $start_time >= '10:00:00' and $end_time <= '22:00:00' and $end_time >= '10:00:00') {

                    $sql = "INSERT INTO showtimes (movie_id, movie_title, theater_id, showtime_date, start_time, end_time) VALUES ('$assigning_movie_id', '$assigning_movie_title','$assigning_theaters', '$assigning_date', '$start_time', '$end_time')";
                    if ($conn->query($sql) === TRUE) {
                        // echo "Showtime added to cart successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }


                    $sql = "UPDATE movies SET assigned_cinema = '$assigning_theaters' WHERE id = $assigning_movie_id";

                    if ($conn->query($sql) === TRUE) {
                        // echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
                echo "$i\n";

                echo "$start_time\n";

                echo "$end_time\n";

            }
            $opening_time = date_create('10:00:00');
            $closing_time = date_create('22:00:00');
            $day_offset++;
        }
    }
}
mysqli_close($conn);
header("Location: ../../../admin/index.php");
?>