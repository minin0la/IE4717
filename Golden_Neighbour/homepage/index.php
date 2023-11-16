<?php
include "..\scripts\php\movies\getMovies.php";
session_start();
$genres = array_unique(array_column($result_array, 'genre'));
$classifications = array_unique(array_column($result_array, 'film_classification'));

if (isset($_GET['genre']) && $_GET['genre'] !== 'all') {
	$selectedGenre = $_GET['genre'];
	$filteredMovies = array_filter($result_array, function ($movie) use ($selectedGenre) {
		return $movie['genre'] === $selectedGenre;
	});
} else {
	$filteredMovies = $result_array;
}

if (isset($_GET['classification']) && $_GET['classification'] !== 'all') {
	$selectedClassification = $_GET['classification'];
	$filteredMovies = array_filter($filteredMovies, function ($movie) use ($selectedClassification) {
		return $movie['film_classification'] === $selectedClassification;
	});
}

if (isset($_GET['search'])) {
	$searchQuery = strtolower($_GET['search']);
	$filteredMovies = array_filter($filteredMovies, function ($movie) use ($searchQuery) {
		$title = strtolower($movie['title']);
		$classification = strtolower($movie['film_classification']);
		return strpos($title, $searchQuery) !== false || strpos($classification, $searchQuery) !== false;
	});
}

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

	<div id="wrapper">
		<div class="parent">
			<?php
			shuffle($result_array);

			?>
			<!--feature -->
			<?php
			if (!empty($result_array)) {
				$sample_movie = $result_array[0]; // Assuming there's at least one movie
				echo '<pre>';
				echo '</pre>';
				echo '</pre>';
			}
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
			<form action="" method="get">
				<label for="search">Search by Movie Name</label>
				<input type="text" id="searchBar" name="search">
				<input type="submit" value="Search">
			</form>
			<label for="genreDropdown">Genre:</label>
			<select id="genreDropdown" name="genre" onchange="filterMovies()">
				<option value="all">All</option>
				<?php
				foreach ($genres as $genre) {
					$selected = (isset($_GET['genre']) && $_GET['genre'] === $genre) ? 'selected' : '';
					echo "<option value='$genre' $selected>$genre</option>";
				}
				?>
			</select>

			<label for="classificationDropdown">Film Classification:</label>
			<select id="classificationDropdown" name="film_Classification" onchange="filterMovies()">
				<option value="all">All</option>
				<?php
				foreach ($classifications as $classification) {
					$selected = (isset($_GET['classification']) && $_GET['classification'] === $classification) ? 'selected' : '';
					echo "<option value='$classification' $selected>$classification</option>";
				}
				?>
			</select>

			<!-- Movies -->
			<div id="movie">
				<?php

				//shuffle $result_array
				
				foreach (array_slice($filteredMovies, 0, 4) as $movie) {

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

					echo "<p>Film Classification: {$movie['film_classification']}";
					echo "<p>Genre: {$movie['genre']}";
					echo "</p>";
					echo "<a href='../details?id={$movie['id']}' class='buy_button'>Buy Ticket</a>";
					echo "</div>";

				}
				?>
			</div>
		</div>
		<!-- Expand -->
		<div class="showmore_button">
			<button class="collapisble-button" onClick="toggleCollapsible()"> Show More</button>
		</div>

		<div class="collapsible-content" id="collapsibleContent">
			<div class='parent'>
				<div id="movie">
					<!-- Movies -->
					<?php
					$max_length = count($filteredMovies);

					$increment = 4;
					$start = 4;
					$length = $start + $increment;

					foreach (array_slice($filteredMovies, $start, $length) as $movie) {

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

						echo "<p>Film Classification: {$movie['film_classification']}";
						echo "<p>Genre: {$movie['genre']}";
						echo "</p>";
						echo "<a href='../details?id={$movie['id']}' class='buy_button'>Buy Ticket</a>";
						echo "</div>";
					}

					?>
				</div>
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