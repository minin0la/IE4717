<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

// Secure the input
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password using Argon2
$hashed_password = password_hash($password, PASSWORD_ARGON2I);

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful. <a href='../../../login/index.html'>Login here</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>