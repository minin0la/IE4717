<!DOCTYPE html>
<html>

<head>
    <title>List of Movies</title>
</head>

<body>
    <h1>List of Movies</h1>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<h2>{$row['title']}</h2>";
            echo "<img src='{$row['poster_url']}' alt='{$row['title']}'>";
            echo "</div>";
        }
    } else {
        echo "No movies found";
    }

    mysqli_close($conn);
    ?>
</body>

</html>