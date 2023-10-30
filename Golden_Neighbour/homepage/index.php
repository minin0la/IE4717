<?php
include "..\scripts\php\getMovies.php";
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
				</div>
				<!-- <div id="right-header-button-link">
					<a href="../login/index.html" class="button-link"> Login </a>
				</div>
				<div class="my-profile-button-link">
					<a href="../signup/signup.html" class="button-link">Sign Up</a>
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
						<a href='../signup/signup.html' class='button-link'>Sign Up</a>
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
			<h1>Feature Movie</h1>
			<div class="left">
				<?php echo "<h1><Strong>{$result_array[4]['title']}</Strong></h1>" ?>

				<!-- <?php echo "<p><strong>{$result_array[4]['movie_description']}</strong></p>" ?> -->

				<?php echo "<a href='../details?id={$result_array[4]['id']}' class='buy_button'>Buy Ticket</a>" ?>
			</div>

			<div class="right">
				<?php echo "<img src='../src/img/movie_posters/{$result_array[4]['id']}.jpg' alt='barbie' class='Movie' style='width:300px'>" ?>
			</div>
		</div>
	</div>

	<div id="wrapper">
		<div class="parent">
			<h1> Now Showing </h1>
			<div id="movie">
				<!-- Movies -->
				<?php
				$count = 0;
				//shuffle $result_array
				foreach ($result_array as $movie) {
					echo "<div class='division'>";
					echo "<img src='../src/img/movie_posters/{$movie['id']}.jpg' alt='{$movie['title']}' class='Movie' style='width:250px' ; 'height:115px' ;>";
					echo "<p>{$movie['title']}";
					echo "<br> Rating: {$movie['rating']}/5";
					echo "<br> Film Classification: {$movie['file_classification']}";
					echo "<br>";
					echo "<label for='selectBox'>Movie Format:</label>";
					echo "<select id='selectBox'>";
					echo "<option value='option1'>Digital</option>";
					echo "<option value='option2'>3D</option>";
					echo "</select>";
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
				<div id="movie">
					<!-- Movies -->
					<div class='division'>
						<img src="../movie/wonka.webp" alt="wonka" class="Movie" style="width:250px" ; "height:115px" ;>
						<p> Wonka
							<br> Rating: 4.7/5
							<br> Film Classification:
							<br>

							<label for="selectBox">Movie Format:</label>
							<select id="selectBox">
								<option value="option1">Digital</option>
								<option value="option2">3D</option>
							</select>
						</p>
						<a href="oppenheimer.html" class="buy_button">Buy Ticket</a>
					</div>

					<div class='division'>
						<img src="../movie/hopeless.jpg" alt="hopeless" class="Movie" style="width:250px"
							; "height:115px" ;>
						<p> Hopeless
							<br> Rating: 4.7/5
							<br> Film Classification:
							<br>

							<label for="selectBox">Movie Format:</label>
							<select id="selectBox">
								<option value="option1">Digital</option>
								<option value="option2">3D</option>
							</select>
						</p>
						<a href="mission_impossible.html" class="buy_button">Buy Ticket</a>
					</div>
					<div class='division'>
						<img src="../movie/the_nun_2.webp" alt="equalizer3" class="Movie" style="width:250px"
							; "height:115px" ;>
						<p> The Nun II
							<br> Rating: 4.7/5
							<br> Film Classification:
							<br>

							<label for="selectBox">Movie Format:</label>
							<select id="selectBox">
								<option value="option1">Digital</option>
								<option value="option2">3D</option>
							</select>
						</p>
						<a href="equalizer3.html" class="buy_button">Buy Ticket</a>
					</div>
					<div class='division'>
						<img src="../movie/the_marvel.webp" alt="the marvel 
				class=" Movie" style="width:250px" ; "height:115px" ;>
						<p> Marvel Studio: The Marvel*
							<br> Rating: 4.7/5
							<br> Film Classification:
							<br>

							<label for="selectBox">Movie Format:</label>
							<select id="selectBox">
								<option value="option1">Digital</option>
								<option value="option2">3D</option>
							</select>
						</p>
						<a href="mission_impossible.html" class="buy_button">Buy Ticket</a>
					</div>
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