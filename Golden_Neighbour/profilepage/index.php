<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("Location: ../login");
}
include "../scripts/php/transactions/getTransactions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./profilepage.css">
	<!-- <script src="./profilepage.js"></script> -->
	<title>Profile Page</title>
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

	<!-- Profile Page -->
	<div class="profile-info">
		<div class="profile-header">
			<h1>My Profile</h1>
			<div class="action-buttons">
				<a href="../changepw" class="change-password-button">Change Password</a>
				<!-- <button id="logout-button">Logout</button> -->
				<a href="../scripts/php/auth/logout.php" class="logout-button">Logout</a>
			</div>
		</div>
		<p class="profile-details">
			Name:
			<?php echo ucfirst($_SESSION['firstname']) . " " . ucfirst($_SESSION['lastname']) ?><br>
			Joined:
			<?php echo $_SESSION['join_date'] ?><br>
			<!-- Joined: October 22, 2023 -->
		</p>
	</div>

	<hr>

	<div class="booking-history">
		<h1>Booking History</h1>
		<?php
		foreach ($transaction_array as $transaction) {
			echo "<div class='card'>";
			echo "<h2>Booking #" . $transaction['booking_id'] . "</h2>";
			echo "<p>User ID: " . $transaction['email'] . "</p>";
			echo "<p>Title: " . $transaction['movie_title'] . "</p>";
			echo "<p>Seat: " . $transaction['selected_seat'] . "</p>";
			echo "<p>Cinema: " . $transaction['theater_id'] . "</p>";
			echo "<p>Date: " . $transaction['movie_date'] . "</p>";
			echo "<p>Time: " . $transaction['movie_time'] . "</p>";
			echo "<p>Quantity: " . $transaction['qty'] . "</p>";
			echo "<p>Price: $" . $transaction['price'] . "</p>";

			echo "</div>";
		}
		?>
	</div>


	<!-- Footer -->
	<footer>
		<img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px"
			; "height:150px" ;>
		<hr>
		<p>&copy;2023 Privacy-Terms </p>
	</footer>
</body>

</html>