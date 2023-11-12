<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: ../login/index.html");
}
include "..\scripts\php\movies\getMovies.php";
include "..\scripts\php\showtimes\getShowtime.php";
?>

<?php
// session_start();
include 'db.php'; // Include the database connection


$available_seats = array(
  array("A1", "A2", "A3", "A4"),
  array("B1", "B2", "B3", "B4"),
  array("C1", "C2", "C3", "C4"),
  array("D1", "D2", "D3", "D4"),
  array("E1", "E2", "E3", "E4")
);

$movie_title = $_GET['movie_title'];
$movie_date = $_GET['movie_date'];
$movie_time = $_GET['movie_time'];

$connection = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT selected_seat FROM transactions WHERE movie_title='$movie_title' AND movie_date='$movie_date' AND movie_time='$movie_time'";
$result = mysqli_query($connection, $query);

// Create an array to store the taken seats
$taken_seats = array();

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $selected_seats = explode(",", $row['selected_seat']);
    $taken_seats = array_merge($taken_seats, $selected_seats);
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["selected_seat"])) {
    $selected_seats = $_POST["selected_seat"];
    $theater_id = $_POST["theater_id"];
    $movie_title = $_POST["movie_title"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $date = $_POST["showtime_date"];
    $time = $_POST["start_time"];

    // foreach ($selected_seats as $seat) {
    $sql = "INSERT INTO cart (selected_seat, email, theater_id, movie_title, qty, price, movie_date, movie_time) VALUES ('$selected_seats', '{$_SESSION['email']}', '$theater_id', '$movie_title', '$qty', '$price', '$date', '$time')";
    if ($conn->query($sql) === TRUE) {
      echo "Seat $seat added to cart successfully.";
      header("Location: ../cart/index.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./seating.css" />
  <!-- <script src="./seating.js"></script> -->
  <script>
    function toggleSeat(seat) {
      seat.classList.toggle("selected");
      var seatName = seat.getAttribute('data-seat');
      var selectedSeats = document.getElementById('selected_seats');
      var selectedSeatsValue = selectedSeats.value.split(",");
      const totalSelectedSeats = document.getElementById("total-selected-seats");
      const totalPrice = document.getElementById("total-price");
      const qty = document.getElementById("qtys");
      const price = document.getElementById("prices");
      if (seat.classList.contains('selected')) {
        if (selectedSeatsValue[0] === "") {
          selectedSeatsValue.shift();
        }
        selectedSeatsValue.push(seatName);
      } else {
        var index = selectedSeatsValue.indexOf(seatName);
        if (index > -1) {
          selectedSeatsValue.splice(index, 1);
        }
      }
      selectedSeats.value = selectedSeatsValue.join(",");
      totalSelectedSeats.textContent = selectedSeatsValue.join(",");
      totalPrice.textContent = selectedSeatsValue.length * 10;
      qty.value = selectedSeatsValue.length;
      price.value = selectedSeatsValue.length * 10;
      // }
    }
  </script>
  <title>Seat Selection</title>
</head>

<body>
  <div id="wrapper">
    <!-- Header -->
    <header>
      <div id="goldenhead">
        <img src="../src/img/Logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:125px"
          ; "height:115px" ;>
        <div id="left-header-button-link">
          <a href="../homepage/#movie" class="button-link"> Movies</a>
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

    <!-- Booking Details -->
    <div class="moviedetails">
      <h2>Movie Details</h2>
      <div id="parent" class="clearfix">
        <div class="left">
          <?php
          foreach ($result_array as $movie) {
            if ($movie['id'] == $_GET['movie_id']) {
              $matchingMovies = $movie;
            }
          }
          echo "<img src='../src/img/movie_posters/{$matchingMovies['id']}.jpg' alt='Movie Poster'  class='Movie' style='width:400px;'>";
          ?>

        </div>
        <div class="right">
          <h1>Seat Selection</h1>

          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="seat-map">
              <?php


              foreach ($available_seats as $row) {
                echo " <div class='seat-row'>";
                foreach ($row as $seat) {
                  $is_taken = in_array($seat, $taken_seats);
                  $disable_click = $is_taken ? " onclick='return false;'" : "onclick='toggleSeat(this)'";
                  $disable_seat = $is_taken ? "X" : "$seat";
                  $disable_color = $is_taken ? "background-color: red;'" : "";
                  echo "<div class='seat' data-seat='$seat' $disable_click style='text-indent: 0px; $disable_color'>$disable_seat</div>";
                }
                echo "</div>";
              }
              // foreach ($available_seats as $row) {
              //   echo " <div class='seat-row'>";
              //   foreach ($row as $seat) {
              //     // $checked = in_array($seat, $_SESSION["selected_seats"]) ? "selected" : "";
              //     echo "<div class='seat' data-seat='$seat' onclick='toggleSeat(this)' style='text-indent: 0px'>$seat</div>";
              //   }
              //   echo "</div>";
              // }
              ?>
              <br>
              <input type="hidden" id="selected_seats" name="selected_seat" value="">

              <input type="hidden" id="qtys" name="qty" value="">

              <input type="hidden" id="prices" name="price" value="">
              <?php
              foreach ($showtime_array as $showtime) {
                if ($showtime['showtime_id'] == $_GET['showtime_id']) {
                  $matchingShowtime = $showtime;
                  echo '<input type="hidden" id="showtime_date" name="showtime_date" value="' . $matchingShowtime["showtime_date"] . '">';
                  echo '<input type="hidden" id="start_time" name="start_time" value="' . $matchingShowtime["start_time"] . '">';
                  echo '<input type="hidden" id="theater_id" name="theater_id" value="' . $matchingShowtime["theater_id"] . '">';
                }
              }
              ?>
              <?php
              echo
                '<input type="hidden" id="movie_titles" name="movie_title" value=' . $matchingMovies['title'] . '>';

              ?>
              <!-- <input type="submit" value="Select Seats"> -->
            </div>

            <!-- Display the number of selected seats and price -->
            <div class="selection-info">
              <p>
                Total Seats Chosen: <span id="total-selected-seats">0</span>
              </p>
              <p>Total Price: $<span id="total-price">0</span></p>
            </div>
            <div id="button-shifting">
              <!-- Continue button -->
              <button type="submit" id="addtocart-button">Add to Cart</button>
              <!-- <button id="paynow-button" disabled>Pay Now</button> -->
            </div>
          </form>
        </div>
      </div>
      <!DOCTYPE html>
      <html>

      <head>
        <title>Select Seats</title>
        <style>
          /* Your CSS styles here */
        </style>
      </head>

      <body>




      </body>

      </html>

    </div>

    <div class="moviedetails"></div>

    <!-- Footer -->
    <footer>
      <img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px" ; "height:150px"
        ;>
      <hr />
      <p>&copy;2023 Privacy-Terms</p>
    </footer>
  </div>

</body>

</html>