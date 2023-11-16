<?php
include "..\scripts\php\movies\getMovies.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movie Details</title>

	<link rel="stylesheet" href="style2.css">
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
					<a href="#movie" class="button-link"> Movies</a>
					<?php
				// Start the session
			

				// Check if the user is logged in and has the role "admin"
				if (isset($_SESSION['permission']) && $_SESSION['permission'] === 'admin') {
				// The user is an admin, show the button
				echo "<a href='../admin' class='admin-button'>Administrator</a>";				
				} 
				?>
				</div>
			

				<!-- <div id="right-header-button-link">
					<a href="../login/index.html" class="button-link"> Login </a>
				</div>
				<div class="my-profile-button-link">
					<a href="../signup" class="button-link">Sign Up</a>
				</div> -->
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
					<a href='../login/index.html' class='button-link'> Login </a>
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

	<div id="wrapper">
		<div class="parent">
			<?php
			shuffle($result_array);

			?>
			<!--feature -->
			<?php
			if ($result_array == []) {
				echo "<h1>Feature Movie</h1>";
				echo "<div class='left'>";
				echo "<h1><Strong>Coming Soon</Strong></h1>";
				echo "</div>";
				echo "<div class='right'>";
				// echo "<img src='../src/img/movie_posters/comingsoon.jpg' alt='barbie' class='Movie' style='width:300px'>";
				echo "</div>";
			} else {
				echo "<h1>Feature Movie</h1>";
				echo "<div class='left'>";
				echo "<h1><Strong>{$result_array[0]['title']}</Strong></h1>";
				echo "<a href='../details?id={$result_array[0]['id']}' class='buy_button'>Buy Ticket</a>";
				echo "</div>";
				echo "<div class='right'>";
				echo "<img src='{$result_array[0]['image_url']}' alt='{$result_array[0]['title']}' class='Movie' style='width:300px'>";
				echo "</div>";
			}
			?>
		</div>
	</div>

	<div id="wrapper">
		<div class="parent">
			<h1> Now Showing </h1>
			<!-- Search Bar -->
			<input type="text" id="searchBar" onkeyup="searchMovies()" placeholder="Search for movies...">
			</input>
			<label for="genreDropdown">Genre:</label>
			<select id="genreDropdown" name="genre" onchange="searchGenre()">
				<option value=""></option>
				<option value="Genre: Comedy">Comedy</option>
				<option value="Genre: Action">Action</option>
				<option value="Genre: Drama">Drama</option>
				<option value="Genre: Horror">Horror</option>
				<option value="Genre: Fantasy">Fantasy</option>
				<option value="Genre: Sci-Fi">Sci-Fi</option>
				<option value="Genre: Thriller">Thriller </option>
				<option value="Genre: Romance">Romance</option>
				<option value="Genre: Adventure">Adventure</option>
				<option value="Genre: Crime">Crime</option>
				<option value="Genre: Mystery">Mystery</option>
				<option value="Genre: Animation">Animation</option>
				<option value="Genre: Family">Family</option>
				<option value="Genre: Biography">Biography</option>
				<option value="Genre: History">History</option>
				<option value="Genre: War">War</option>
				<option value="Genre: Music">Music</option>
				<option value="Genre: Musical">Musical</option>
				<option value="Genre: Sport">Sport</option>
				<option value="Genre: Western">Western</option>
				<option value="Genre: Documentary">Documentary</option>
				<option value="Genre: Film-Noir">Film-Noir</option>
				<option value="Genre: Short">Short</option>
				<option value="Genre: News">News</option>
				<option value="Genre: Talk-Show">Talk-Show</option>
				<option value="Genre: Reality-TV">Reality-TV</option>
				<option value="Genre: Game-Show">Game-Show</option>
				<option value="Genre: Adult">Adult</option>
				<option value="Genre: Concert">Concert</option>
				<!-- Add more options as needed -->
			</select>
			<label for="classificationDropdown">Film Classification:</label>
			<select id="classificationDropdown" name="Film_Classification" onchange="filmClassification()">
				<option value=""></option>
				<option value="Film Classification: G">G</option>
				<option value="Film Classification: PG">PG</option>
				<option value="Film Classification: PG-13">PG-13</option>
				<option value="Film Classification: R">R</option>
				<option value="Film Classification: NC-17">NC-17</option>
				<!-- Add more options as needed -->
			</select>

			<!-- Movies -->
			<div id="movie">
				<?php
				$count = 0;
				//shuffle $result_array
				
				foreach ($result_array as $movie) {

					echo "<div class='division'>";
					echo "<img src='{$movie['image_url']}' alt='{$movie['title']}' class='Movie' style='width:250px' ; 'height:115px' ;>";
					echo "<p>{$movie['title']}";

					// Calculate the number of filled stars and the fraction based on the rating
					$rating = $movie['rating'];
					$filledStars = floor($rating);
					$fraction = $rating - $filledStars;

					echo "<p>Rating: ";
					for ($i = 1; $i <= 5; $i++) {
						if ($i <= $filledStars) {
							echo "<span style='color: #FFD700;'>★</span>"; // Full-filled star with gold/yellow color
						} elseif ($i == $filledStars + 1 && $fraction >= 0.5) {
							echo "★"; // White star
						} else {
							echo "☆"; // Empty star
						}
					}
					echo " ({$movie['rating']}/5)";

					echo "<p>Film Classification: {$movie['flim_classification']}";
					// echo "<label for='selectBox'>Movie Format:</label>";
					// echo "<select id='selectBox'>";
					// echo "<option value='option1'>Digital</option>";
					// echo "<option value='option2'>3D</option>";
					// echo "</select>";
					echo "<p>Genre: {$movie['genre']}";
					echo "</p>";
					echo "<a href='../details?id={$movie['id']}' class='buy_button'>Buy Ticket</a>";
					echo "</div>";
					$count++;
					if ($count > 3) {
						break;
					}
				}
				?>
			</div>
		</div>
		<!-- Expand -->
		<div class="showmore_button">
			<button class="collapisble-button" onClick="toggleCollapsible()"> Show More</button>
		</div>

		<div class="collapsible-content" id="collapsibleContent">
			<div class="parent">

				<!-- Movies -->
				<?php
				$count = 0;
				$start_count = 0;
				foreach ($result_array as $movie) {
					if ($count < 4) {
						$count++;
						continue;
					}
					if ($start_count == 0) {
						echo "<div id='movie'>";
					}
					echo "<div class='division'>";
					echo "<img src='../src/img/movie_posters/{$movie['id']}.jpg' alt='{$movie['title']}' class='Movie' style='width:250px' ; 'height:115px' ;>";
					echo "<p>{$movie['title']}";

					// Calculate the number of filled stars and the fraction based on the rating
					$rating = $movie['rating'];
					$filledStars = floor($rating);
					$fraction = $rating - $filledStars;

					echo "<p>Rating: ";
					for ($i = 1; $i <= 5; $i++) {
						if ($i <= $filledStars) {
							echo "<span style='color: #FFD700;'>★</span>"; // Full-filled star with gold/yellow color
						} elseif ($i == $filledStars + 1 && $fraction >= 0.5) {
							echo "★"; // White star
						} else {
							echo "☆"; // Empty star
						}
					}
					echo " ({$movie['rating']}/5)";

					echo "<p>Film Classification: {$movie['flim_classification']}";
					// echo "<label for='selectBox'>Movie Format:</label>";
					// echo "<select id='selectBox'>";
					// echo "<option value='option1'>Digital</option>";
					// echo "<option value='option2'>3D</option>";
					// echo "</select>";
					echo "<p>Genre: {$movie['genre']}";
					echo "</p>";
					echo "<a href='../details?id={$movie['id']}' class='buy_button'>Buy Ticket</a>";
					echo "</div>";
					$start_count++;
					$count++;
				}
				?>
			</div>
		</div>
	</div>
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