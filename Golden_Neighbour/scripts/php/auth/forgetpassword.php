<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $conn = mysqli_connect("localhost", "root", "", "goldenneighbour");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $to = $row['email'];

    if (!$to) {
        return "Error sending email: email not found";
    }

    $password = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);
    $hashed_password = password_hash($password, PASSWORD_ARGON2I);

    $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (!$result) {
        return "Error updating password";
    }

    // Send new password to user's email
    $subject = "Password changed successfully";
    $message = "Your new password is: $password";
    $headers = "From: manager@localhost";

    if (!mail($to, $subject, $message, $headers)) {
        return "Error sending email";
    }

    echo "Password updated successfully and new password sent to email, Check your email for new password. Click <a href='../../../login/index.html'>here</a> to login.";
}
?>