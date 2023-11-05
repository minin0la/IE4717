<?php
include "..\scripts\php\movies\getMovies.php";
include "..\scripts\php\movies\getShowtime.php";
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
	</div>

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
								<?php echo "{$matchingMovies['file_classification']}" ?>					
						</div>
					</div>
				</div>
				
					<h2>Description</h2>
				<div class="form-group">
						<label class="Description">
						<?php echo "{$matchingMovies['movie_description']}" ?>
					</label>
					</div>

					<div class="indented-video">
						<label class="movie-description"></label>
							<video width="720" height="400" controls class="mp-player">
							<source src="../movie/barbie.mp4" type="video/mp4">
							</video>
					</div>		
				</div>
			</div>
			<h1>Showtime</h1>
			<div class="selection_container">
				<div class="selection_date">
					<label for="selectDate">Select Date:</label>
					<select id="selectDate">
					<!-- JavaScript will populate the dates here -->
					</select>
				</div>

				<div class="selection_format">
					<label for="selectFormat">Select Movie Format:</label>
					<select id="selectFormat">
					<option value="option1">Digital</option>
					<option value="option2">3D</option>
					</select>
				</div>
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
</body>

</html>