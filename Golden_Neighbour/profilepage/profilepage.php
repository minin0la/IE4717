<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("Location: ../login/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./profilepage.css">
	<script src="./profilepage.js"></script>
	<title>Profile Page</title>
</head>

<body>
	<div id="wrapper">
		<!-- Header -->
		<header>
			<div id="goldenhead">
				<img src="../Logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:125px"
					; "height:115px" ;>
				<div id="left-header-button-link">
					<a href="../homepage/#movie" class="button-link"> Movies</a>
				</div>

				<div id="right-header-button-link">
					<a href="../cart/cart.html" class="button-link"> Cart </a>
				</div>
				<div class="my-profile-button-link">
					<a href="profilepage.php" class="button-link">My Profile</a>
				</div>
			</div>
		</header>
	</div>

	<!-- Profile Page -->
	<div class="profile-info">
		<div class="profile-header">
			<h1>My Profile</h1>
			<div class="action-buttons">
				<button id="change-password-button">Change Password</button>
				<button id="logout-button">Logout</button>
			</div>
		</div>
		<p class="profile-details">
			Name: John Doe<br>
			Joined: October 22, 2023
		</p>
	</div>

	<hr>

	<div class="booking-history">
		<h1>Booking History</h1>
		<!-- Card elements will be dynamically generated here -->
	</div>


	<!-- Footer -->
	<footer>
		<img src="../Logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px" ; "height:150px" ;>
		<hr>
		<p>&copy;2023 Privacy-Terms </p>
	</footer>
</body>

</html>