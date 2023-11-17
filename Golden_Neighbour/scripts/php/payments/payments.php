<?php
$email = $_SESSION['email'];
$cart_id = $_POST['cart_id'];
$theater_id = $_POST['theater_id'];
$selected_seat = $_POST['selected_seat'];
$email = $_POST['email'];
$movie_date = $_POST['movie_date'];
$movie_time = $_POST['movie_time'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$to = $email;
$subject = "You have booked a movie!";
$message = "You have booked a movie! Here are the details: \n\nMovie Title: $movie_title \nSelected Seat: $selected_seat \nCinema: $theater_id \nEmail: $email \nMovie Date: $movie_date \nMovie Time: $movie_time \nQuantity: $qty \nPrice: $price";
$headers = "From: manager@localhost"; // Replace with your email address
// Attempt to send the email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
    $conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $movie_title = mysqli_real_escape_string($conn, $_POST['movie_title']);
    $sql = "INSERT INTO transactions (movie_title, selected_seat, theater_id, email, movie_date, movie_time, qty, price) VALUES ('$movie_title', '$selected_seat', '$theater_id','$email', '$movie_date', '$movie_time', '$qty', '$price')";
    $result = mysqli_query($conn, $sql);

    if ($result === FALSE) {
        die("Error executing query: " . $conn->error);
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $cart_id = $_POST['cart_id'];
    $sql = "DELETE FROM cart WHERE selected_seat = $selected_seat AND ";
    $result = mysqli_query($conn, $sql);

    if ($result === FALSE) {
        die("Error executing query: " . $conn->error);
    }
    $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
    $result = mysqli_query($conn, $sql);

    if ($result === FALSE) {
        die("Error executing query: " . $conn->error);
    }


    mysqli_close($conn);
    header("Location: ../../../homepage/index.php");
} else {
    echo "Error sending email.";
}
?>