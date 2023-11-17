<?php
session_start();
include "..\scripts\php\movies\getMovies.php";
include "..\scripts\php\showtimes\getShowtime.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movie Details</title>

	<link rel="stylesheet" href="details.css">
	<script src="details.js"></script>
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

	<div class="parent">
		<div id="movie">
			<?php

			foreach ($result_array as $movie) {
				if ($movie['id'] == $_GET['id']) {
					$matchingMovies = $movie;
				}
			}
			?>
			<!--feature -->
			<div class="left">
				<?php echo "<img src='{$matchingMovies['image_url']}' alt='{$matchingMovies['title']}' class='Movie' style='width:400px;'>" ?>
			</div>

			<div class="right">
				<h1><label class="movie-name">
						<?php echo "{$matchingMovies['title']}" ?>
					</label></h1>
				<h2>Details</h2>
				<div class="container">
					<div class="column">
						<div class="form-group">Cast:
							<?php echo "{$matchingMovies['cast']}" ?>
						</div>
						<div class="form-group">Release Date:
							<?php echo "{$matchingMovies['release_date']}" ?>
						</div>
						<div class="form-group">Director:
							<?php echo "{$matchingMovies['director']}" ?>
						</div>
						<div class="form-group">Running Time:
							<?php echo "{$matchingMovies['runtime_minutes']}" ?>
						</div>
					</div>
					<div class="column">
						<div class="form-group">Genre:
							<?php echo "{$matchingMovies['genre']}" ?>
						</div>
						<div class="form-group">Language:
							<?php echo "{$matchingMovies['movie_language']}" ?>
						</div>
						<div class="form-group">Film Classification:
							<?php echo "{$matchingMovies['film_classification']}" ?>
						</div>
					</div>
				</div>

				<h2>Description</h2>
				<div class="form-group">
					<label class="Description">
						<?php echo "{$matchingMovies['movie_description']}" ?>
					</label>
				</div>
				<h2>Trailer</h2>
				<?php
				echo '<a href="' . $matchingMovies['trailer_url'] . '" style="color: red;">Watch Trailer here</a>'
					?>

				<!-- <div class="video-container">
					<video class="video" controls class="mp-player">
						<source src="../movie/barbie.mp4" type="video/mp4">
					</video>
				</div> -->
			</div>
		</div>
	</div>
	<h1>Showtime</h1>
	<div class="selection_container">
		<div class="selection_date">
			<label for="selectDate">Select Date:</label>
			<select id="selectDate" onchange="updateShowtimes()">
				<?php
				$today = strtotime('today');
				$unique_dates_by_movie = array();

				foreach ($showtime_array as $showtime) {
					$movie_id = $showtime['movie_id'];
					$showtime_date = $showtime['showtime_date'];
					if ($showtime_date >= $today) {
						if (!isset($unique_dates_by_movie[$movie_id])) {
							$unique_dates_by_movie[$movie_id] = array();
						}

						if (!in_array($showtime_date, $unique_dates_by_movie[$movie_id])) {
							$unique_dates_by_movie[$movie_id][] = $showtime_date;
						}
					}
				}

				foreach ($unique_dates_by_movie as $movie_id => $unique_dates) {
					if ($movie_id != $_GET['id']) {
						continue;
					}
					echo 'Movie ID ' . $movie_id . ' has unique dates: ';
					echo '[' . implode(',', $unique_dates) . ']';
					echo '<br>';

					$selected = true;
					foreach ($unique_dates as $showtime_date) {
						$selected_attribute = $selected ? 'selected' : '';
						echo '<option value="' . $showtime_date . '" ' . $selected_attribute . '>' . $showtime_date . '</option>';
						$selected = false;
					}
				}
				?>
			</select>
		</div>

		<!-- <div class="selection_format">
			<label for="selectFormat">Select Movie Format:</label>
			<select id="selectFormat">
				<option value="option1">Digital</option>
				<option value="option2">3D</option>
			</select>
		</div> -->
	</div>
	</div>

	<div class="showtimes" id="showtimesContainer">
		<h2>Showtimes:</h2>
		<ul id="showtimesList">
			<?php
			foreach ($showtime_array as $showtime) {
				if ($showtime['movie_id'] == $_GET['id']) {
					$matchingShowtime = $showtime;
					echo "<a href='../seating/?showtime_id={$matchingShowtime['showtime_id']}' class='slot' data-showtime-date='{$matchingShowtime['showtime_date']}'><button>{$matchingShowtime['start_time']}</button></a>";
				}
			}
			?>
		</ul>
	</div>
	<footer>
		<img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px"
			; "height:150px" ;>
		<hr>
		<p>&copy;2023 Privacy-Terms </p>
	</footer>
</body>

</html>