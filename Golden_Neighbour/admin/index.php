<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login");
}
if ($_SESSION['permission'] != 'admin') {
    header("Location: ../homepage/index.php");
}
include "..\scripts\php\movies\getMovies.php";
include "..\scripts\php\showtimes\getShowtime.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./adminpage.css" />
    <script src="./login.js"></script>
    <script src="admin.js"></script>
    <title>Login Page</title>
</head>

<body>
    <div id="wrapper">
        <!-- Header -->
        <header>
            <div id="goldenhead">
                <img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:125px"
                    ; "height:115px" ;>
                <div id="left-header-button-link">
                    <a href="../homepage" class="button-link"> Movies</a>
                    <?php
                    // Check if the user is logged in and has the role "admin"
                    if (isset($_SESSION['permission']) && $_SESSION['permission'] === 'admin') {
                        // The user is an admin, show the button
                        echo "<a href='../admin' class='admin-button'>Administrator</a>";
                    }
                    ?>
                </div>
                <?php
                if (isset($_SESSION['email'])) {
                    echo "<div id='right-header-button-link'>";
                    echo "<a href='../scripts/php/auth/logout.php' class='button-link'>Logout</a>";
                    echo "</div>";
                    echo "<div class='my-profile-button-link'>";
                    echo "<a href='../profilepage/index.php' class='button-link'>My Profile</a>";
                    echo "</div>";
                } else {
                    echo "
					<div id='right-header-button-link'>
					<a href='../login' class='button-link'> Login </a>
					</div>
					<div class='my-profile-button-link'>
						<a href='../signup' class='button-link'>Sign Up</a>
					</div>
					";
                }
                ?>
            </div>
        </header>
    </div>

    <!-- Login -->
    <div class="parent">
        <div class="panel-container">
            <h1>Add Movies</h1>
            <form action="../scripts/php/movies/addMovies.php" method="post" class="two-column-form">
                <div class="form-group">
                    <label for="title">Movie Title:</label>
                    <input id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="director">Director:</label>
                    <input id="director" name="director" required />
                </div>
                <div class="form-group">
                    <label for="cast">Cast:</label>
                    <input id="cast" name="cast" required />
                </div>
                <div class="form-group">
                    <label for="runtime_minutes">Runtime (Minutes):</label>
                    <input type="number" id="runtime_minutes" name="runtime_minutes" required />
                </div>
                <div class="form-group">
                    <label for="genre">Rating:</label>
                    <input type="number" id="rating" name="rating" step="0.1" oninput="validateDecimal(this)"
                        required />
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date:</label>
                    <input type="date" id="release_date" name="release_date" required />
                </div>
                <div class="form-group">
                    <label for="movie_description">Description:</label>
                    <textarea rows="8" cols="77" type="text" id="movie_description" name="movie_description"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input id="image_url" name="image_url" required />
                </div>
                <div class="form-group">
                    <label for="trailer_url">Trailer URL:</label>
                    <input id="trailer_url" name="trailer_url" required />
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input id="price" name="price" required />
                </div>

                <div class="form-group">
                    <label for="movie_language">Language:</label>
                    <select id="movie_language" name="movie_language" required>
                        <option value="English">English</option>
                        <option value="Korean">Korean</option>
                        <option value="Japanese">Japanese</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" id="otherLanguage" name="otherLanguage" style="display: none;"
                        placeholder="Enter other language">

                </div>
                <div class="form-group">
                    <label for="flim_classification">Classification:</label>
                    <select id="flim_classification" name="flim_classification" required>
                        <option value="G">G (General Audience)</option>
                        <option value="PG">PG (Parental Guidance Suggested)</option>
                        <option value="PG-13">PG-13 (Parents Strongly Cautioned)</option>
                        <option value="R">R (Restricted)</option>
                        <option value="NC-17">NC-17 (Adults Only)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">Genre:</label>
                    <select id="genre" name="genre" required>
                        <option value="Comedy">Comedy</option>
                        <option value="Action">Action</option>
                        <option value="Drama">Drama</option>
                        <option value="Horror">Horror</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Thriller">Thriller </option>
                        <option value="Romance">Romance</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Crime">Crime</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Animation">Animation</option>
                        <option value="Family">Family</option>
                        <option value="Biography">Biography</option>
                        <option value="History">History</option>
                        <option value="War">War</option>
                        <option value="Music">Music</option>
                        <option value="Musical">Musical</option>
                        <option value="Sport">Sport</option>
                        <option value="Western">Western</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Film-Noir">Film-Noir</option>
                        <option value="Short">Short</option>
                        <option value="News">News</option>
                        <option value="Talk-Show">Talk-Show</option>
                        <option value="Reality-TV">Reality-TV</option>
                        <option value="Game-Show">Game-Show</option>
                        <option value="Adult">Adult</option>
                        <option value="Concert">Concert</option>
                    </select>
                    <input type="text" id="otherGenre" name="otherGenre" style="display: none;"
                        placeholder="Enter other Genre">
                </div>

                <!-- <div class="form-group">
                    <label for="Venue">Venue:</label>
                    <select id="venue" name="venue" required>
                        <!-- <?php
                        echo '<option value="None" selected>Unassigned</option>';
                        foreach ($unassigned_theaters as $theater_id) {
                            echo '<option value="' . $theater_id . '">Hall ' . $theater_id . '</option>';
                        }

                        ?> -->
                <!-- <option value="1">Hall 1</option>
                        <option value="2">Hall 2</option>
                        <option value="3">Hall 3</option>
                        <option value="4">Hall 4</option>
                        <option value="5">Hall 5</option>
                        <option value="6">Hall 6</option> -->
                </select>
        </div> -->


        <div class="button-container">
            <button type="submit" class="login-button">Add</button>
        </div>
        </form>
    </div>
    </div>
    <div class="parent">
        <div class="panel-container">
            <h1>Edit Movies</h1>
            <?php
            foreach ($result_array as $movie) {
                echo '<div class="movie-entry">';
                echo '<form method="post" action="../scripts/php/movies/deleteMovie.php" class="movie-info">';

                // Movie Title on the left
                echo '<div class="movie-title">';
                echo '<p>' . $movie['title'] . '</p>';
                echo '</div>';

                // Delete button on the right
                echo '<div class="delete-button">';
                echo '<button type="submit" name="movie_id" value="' . $movie['id'] . '" class="link-button">Delete</button>';
                echo '</div>';

                echo '</form>';

                // Venue selection form
                echo '<form action="../scripts/php/showtimes/fillShowtime.php" method="post" class="venue-' . $movie['id'] . '">';

                // Venue selection
                echo '<div class="form-group">';
                echo '<label for="date">Start Date:</label>';
                echo '<input type="date" id="showtime_date" name="showtime_date" value="' . date('Y-m-d') . '"required>';
                echo '<label for="showtime_date_count">How many days? :</label>';
                echo '<input type="number" id="showtime_date_count" name="showtime_date_count" value="1" required>';
                echo '<label for="venue">Venue:</label>';
                echo '<select id="venue" name="venue" onchange="submitForm(' . $movie['id'] . ')">';
                // echo '<option value="None" selected>Unassigned</option>';
                if ($movie['assigned_cinema'] != 0) {
                    echo '<option value="' . $movie['assigned_cinema'] . '" selected>Hall ' . $movie['assigned_cinema'] . '</option>';
                    echo '<option value="None">Unassigned</option>';
                } else {
                    echo '<option value="None" selected>Unassigned</option>';
                    foreach ($unassigned_theaters as $theater_id) {
                        echo '<option value="' . $theater_id . '">Hall ' . $theater_id . '</option>';
                    }
                }
                echo '</select>';
                echo '</div>';
                echo '<input type="hidden" id="movie_id" name="movie_id" value="' . $movie['id'] . '">';
                echo '<input type="hidden" id="movie_title" name="movie_title" value="' . $movie['title'] . '">';
                echo '<input type="hidden" id="runtime_minutes" name="runtime_minutes" value="' . $movie['runtime_minutes'] . '">';
                echo '</form>';
                echo '</div>';
            }
            ?>



            <h1></h1>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px"
            ; "height:150px" ;>
        <hr />
        <p>&copy;2023 Privacy-Terms</p>
    </footer>
</body>

</html>