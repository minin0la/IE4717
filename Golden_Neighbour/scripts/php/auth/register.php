<?php
$conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password != $confirm_password) {
    echo "Passwords do not match. Click <a href='../../../signup'>here</a> to try again.";
} else {
    // Secure the input
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if the email already exists
    $check_sql = "SELECT * FROM users WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "User with this email already exists. Click <a href='../../../signup'>here</a> to try again.";
    } else {
        // Hash the password using Argon2
        $hashed_password = password_hash($password, PASSWORD_ARGON2I);

        $sql = "INSERT INTO users (email, password, firstname, lastname, permission, join_date) VALUES ('$email', '$hashed_password', '$firstname', '$lastname', 'users','" . date('Y-m-d') . "')";

        if (mysqli_query($conn, $sql)) {
            echo "Registration successful. <a href='../../../login'>Login here</a>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>