<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

// Secure the input
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password using Argon2
$hashed_password = password_hash($password, PASSWORD_ARGON2I);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful. <a href='/login.html'>Login here</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>