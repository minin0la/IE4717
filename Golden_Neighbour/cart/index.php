<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("Location: ../login/index.html");
}
include "..\scripts\php\cart\getCart.php";
include "..\scripts\php\movies\getMovies.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./cart.css">
	<script src="./cart.js"></script>
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
					<a href="../homepage/#movie" class="button-link"> Movies</a>
				</div>

				<div id="right-header-button-link">
					<a href="../cart" class="button-link"> Cart </a>
				</div>
				<div class="my-profile-button-link">
					<a href="../profilepage/index.php" class="button-link">My Profile</a>
				</div>
			</div>
		</header>
	</div>

	<!-- Profile Page -->
	<h1> Your Cart </h1>
	<ul id="movie-cart">
		<?php
		foreach ($cart_array as $cart) {
			// $quantity = count($cart['selected_seat']);
			echo '
		<div class="cart-info">
		<span class="close-box" onclick="deleteCart(' . $cart['cart_id'] . ')">X</span>
		<form id="deleteCart-' . $cart['cart_id'] . '" action="../scripts/php/cart/deleteCart.php" method="post">
        <input type="hidden" id="cart_id" name="cart_id" value="' . $cart['cart_id'] . '">
    </form>
		<div id="movieheader">
			<label class="movieheader">Movie Title: ' . $cart['movie_title'] . '</label>
			<label class="cartid">Cart ID: ' . $cart['cart_id'] . '</label>
		</div>

		<div id="dateheader">
			<label class="dateheader">Date: ' . $cart['movie_date'] . '
		</div></label>

		<div id="timeheader">
			<label class="timeheader">Time: ' . $cart['movie_time'] . '
			</label>
		</div>

		<div id="transaction-border">

			<div id="selected-seats">
				<label class="selected-seats">Selected Seats: ' . $cart['selected_seat'] . '</label>
			</div>

			<div id="qty">
				<label class="qty">Quantity: ' . $cart['qty'] . '</label>
			</div>

			<div id="ticket-price">
				<label class="ticket-price">Ticket Price: $' . $cart['price'] . '</label>
			</div>

		</div>

		<div id="final-pricing" class="clearfix">
			<label class="total-price">Total: $' . $cart['price'] . '</label>
			</div>
			<div class="action-button" class="clearfix">
			<form action="../scripts/php/payments/payments.php" method="post">
			<input type="hidden" id="cart_id" name="cart_id" value="' . $cart['cart_id'] . '">
			<input type="hidden" id="movie_title" name="movie_title" value="' . $cart['movie_title'] . '">
			<input type="hidden" id="theater_id" name="theater_id" value="' . $cart['theater_id'] . '">
			<input type="hidden" id="selected_seat" name="selected_seat" value="' . $cart['selected_seat'] . '">
			<input type="hidden" id="email" name="email" value="' . $cart['email'] . '">
			<input type="hidden" id="movie_date" name="movie_date" value="' . $cart['movie_date'] . '">
			<input type="hidden" id="movie_time" name="movie_time" value="' . $cart['movie_time'] . '">
			<input type="hidden" id="qty" name="qty" value="' . $cart['qty'] . '">
			<input type="hidden" id="price" name="price" value="' . $cart['price'] . '">
			<button type="submit" class="paynow-button">Pay Now</button>
			</form>
			</div>

	</div>
		';
		}
		?>
	</ul>

	<!-- Footer -->
	<footer>
		<img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px"
			; "height:150px" ;>
		<hr>
		<p>&copy;2023 Privacy-Terms </p>
	</footer>
</body>

</html>