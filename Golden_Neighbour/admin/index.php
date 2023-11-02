<?php
include "..\scripts\php\getMovies.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./adminpage.css" />
    <script src="./login.js"></script>
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
                    <a href="../homepage/#movie" class="button-link"> Movies</a>
                </div>

                <div id="right-header-button-link">
                    <a href="index.html" class="button-link"> Login </a>
                </div>
                <div class="my-profile-button-link">
                    <a href="../signup/signup.html" class="button-link">Sign Up</a>
                </div>
            </div>
        </header>
    </div>

    <!-- Login -->
    <div class="parent">
        <div class="panel-container">
            <h1>Add Movies</h1>
            <form action="../scripts/php/auth/authentication.php" method="post">
                <div class="form-group">
                    <label for="title">Movie Title:</label>
                    <input id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="title">Director:</label>
                    <input id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="title">Cast:</label>
                    <input id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="title">Runtime (Minutes):</label>
                    <input id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="title">Rating:</label>
                    <input type="number" id="title" name="title" required />
                </div>
                <div class="form-group">
                    <label for="title">Language:</label>
                    <select id="genre" name="genre" required></select>

                </div>
                <div class="form-group">
                    <label for="title">Classification:</label>
                    <select id="genre" name="genre" required></select>

                </div>
                <div class="form-group">
                    <label for="Genre">Genre:</label>
                    <select id="genre" name="genre" required></select>
                </div>
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

                echo '<form method="post" action="../scripts/php/deleteMovie.php" class="inline">
  <p>' . $movie['title'] . '</p>
  <button type="submit" name="movie_id" value="' . $movie['id'] . '" class="link-button">Delete
  </button>
</form>';

                // echo "<p>{$movie['title']}</p> <a href='../scripts/php/deleteMovie.php?movie_id={$movie['id']}'>Delete</a> <br>";
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