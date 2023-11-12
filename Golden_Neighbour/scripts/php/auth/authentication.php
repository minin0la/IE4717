<?php
session_start();
// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

// Secure the input
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        // Authentication successful
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['permission'] = $row['permission'];
        $_SESSION['join_date'] = $row['join_date'];
        header("Location: ../../../homepage/index.php");
    } else {
        // Authentication failed
        echo "Invalid email or password";
    }
} else {
    // User not found
    echo "Invalid email or password";
}

mysqli_close($conn);
?>
?>