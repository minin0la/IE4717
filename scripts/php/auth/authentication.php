<?php
session_start();
// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

// Secure the input
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        // Authentication successful
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        // Authentication failed
        echo "Invalid username or password";
    }
} else {
    // User not found
    echo "Invalid username or password";
}

mysqli_close($conn);
?>
?>