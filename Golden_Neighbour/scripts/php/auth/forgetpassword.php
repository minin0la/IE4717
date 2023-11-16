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

    if (!$row) {
        mysqli_close($conn);
        echo "Invalid Email. Click <a href='../../../forgotpw'>here</a> to try again.";
        // header("Location: forgot_password.php?error=email_not_found");
        exit;
    }

    $to = $row['email'];

    $password = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);
    $hashed_password = password_hash($password, PASSWORD_ARGON2I);

    $update_sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
    $update_result = mysqli_query($conn, $update_sql);

    if (!$update_result) {
        mysqli_close($conn);
        header("Location: forgot_password.php?error=update_failed");
        exit;
    }

    mysqli_close($conn);

    // Send new password to user's email
    $subject = "Password changed successfully";
    $message = "Your new password is: $password";
    $headers = "From: manager@localhost";

    if (!mail($to, $subject, $message, $headers)) {
        header("Location: forgot_password.php?error=email_not_sent");
        exit;
    }

    header("Location: forgot_password.php?success=true");
    exit;
}
?>