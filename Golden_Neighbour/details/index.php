<?php
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
	<script src="function.js"></script>
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
					<a href="../login/index.html" class="button-link"> Login </a>
				</div>
				<div class="my-profile-button-link">
					<a href="../signup/signup.html" class="button-link">Sign Up</a>
				</div>
			</div>
		</header>

		<div id="parent" class="clearfix">
			<?php

			foreach ($result_array as $movie) {
				if ($movie['id'] == $_GET['id']) {
					$matchingMovies = $movie;
				}
			}
			?>
			<!--feature -->
			<div class="left">
				<?php echo "<img src='../src/img/movie_posters/{$matchingMovies['id']}.jpg' alt='barbie' class='Movie' style='width:400px;'>" ?>
			</div>

			<div class="right">
				<h1><label class="movie-name">
						<?php echo "{$matchingMovies['title']}" ?>
					</label></h1>

				<div id="parent">
					<h2>Details</h2>
					<p><label class="Cast">Cast:
							<?php echo "{$matchingMovies['cast']}" ?>
						</label> <label class="release-date">Release Date:
							<?php echo "{$matchingMovies['release_date']}" ?>
						</label></p>
					<p><label class="director">Director:
							<?php echo "{$matchingMovies['director']}" ?>
						</label> <label class="running-time">Running Time:
							<?php echo "{$matchingMovies['runtime_minutes']}" ?>
						</label></p>
					<p><label class="" genre:>Genre:
							<?php echo "{$matchingMovies['genre']}" ?>
						</label> <label class="" language>Language:
							<?php echo "{$matchingMovies['movie_language']}" ?>
						</label> </p>
					<p><label class="" Film Classification>Film Classification:
							<?php echo "{$matchingMovies['file_classification']}" ?>
						</label></p>

				</div>
				<h2>Description</h2>
				<label class="Description">
					<?php echo "{$matchingMovies['movie_description']}" ?>
				</label>

				<div class="indented-video">
					<label class="movie-description"></label>
					<video width="720" height="400" controls class="mp-player">
						<source src="../movie/barbie.mp4" type="video/mp4">
					</video>
				</div>

			</div>
		</div>
		<h1>Showtime</h1>
		<div id="parent" class="clearfix">
			<div class="selection_date">
				<?php
				$startDate = new DateTime();
				$endDate = new DateTime('-20 days');

				while ($startDate <= $endDate) {
					$dateValue = $startDate->format('Y-m-d');
					$dateText = $startDate->format('Y-m-d');
					echo "<option value='$dateValue'>$dateText</option>";
					$startDate->modify('-1 day');
				}
				?>
			</div>

			<div class="selection_format">
				<label for="selectBox">Select Movie Format:</label><br>
				<select id="selectBox">
					<option value="option1">Digital</option>
					<option value="option2">3D</option>
				</select>
			</div>
		</div>
		<div class="parent">
			<?php
			foreach ($showtime_array as $showtime) {
				if ($showtime['movie_id'] == $_GET['id']) {
					$matchingShowtime = $showtime;
				}
				echo "<a href='../seating/?showtime_id={$matchingShowtime['showtime_id']}&movie_id={$matchingShowtime['movie_id']}' class='slot'><button>{$matchingShowtime['start_time']}</button></a>";
			}

			?>
		</div>
		<!-- <a href="../seating/seating.html" class="nineam-slot"><button>9am</button></a>
		<a href="../seating/seating.html" class="twelvepm-slot"><button>12pm</button></a>
		<a href="../seating/seating.html" class="threepm-slot"><button>3pm</button></a>
		<a href="../seating/seating.html" class="fivepm-slot"><button>5pm</button></a>
		<a href="../seating/seating.html" class="sevenpm-slot"><button>7pm</button></a>
		<a href="../seating/seating.html" class="ninepm-slot"><button>9pm</button></a>
		<a href="../seating/seating.html" class="elevenpm-slot"><button>11pm</button></a> -->

		<!-- Footer -->
		<footer>
			<img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px"
				; "height:150px" ;>
			<hr>
			<p>&copy;2023 Privacy-Terms </p>
		</footer>
	</div>
</body>

</html>