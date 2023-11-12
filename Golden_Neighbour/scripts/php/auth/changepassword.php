<?php

// Get current user's email from session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $email = $_SESSION['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Check if old password is correct

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $oldPassword);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if (password_verify($oldPassword, $hashed_password)) {
            // Authentication successful
            $hashed_password = password_hash($newPassword, PASSWORD_ARGON2I);
            $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

        } else {
            echo "Invalid password. Click <a href='../../../changepw'>here</a> to try again.";
        }
    } else {
        // User not found
        echo "Invalid email or password";
    }

    if (!$result) {
        return "Error updating password";
    }
    mysqli_close($conn);

    $subject = "Password changed successfully";
    $message = "If this is not you, please contact us immediately.";
    $headers = "From: manager@localhost";

    if (!mail($email, $subject, $message, $headers)) {
        return "Error sending email";
    }
    session_destroy();

    echo "Password updated successfully. Click <a href='../../../login/index.html'>here</a> to login.";
}
?>