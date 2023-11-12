<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./changepw.css" />
  <script src="./login.js"></script>
  <title>Login Page</title>
</head>

<body>
  <div id="wrapper">
    <!-- Header -->
    <header>
      <div id="goldenhead">
        <img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:125px"
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
  </div>

  <!-- Login -->
  <div class="parent">
    <div class="login-container">
      <h1>Change Password</h1>
      <form action="../scripts/php/auth/changepassword.php" method="POST">
        <div class="form-group">
          <label for="oldPassword">Old Password:</label>
          <input type="password" id="oldPassword" name="oldPassword" required />
          <label for="newPassword">New Password:</label>
          <input type="password" id="newPassword" name="newPassword" required />
        </div>
        <div class="button-container">
          <button type="submit" class="reset-pw-button">
            Reset Password
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <img src="../src/img/logo/bird.png" alt="Golden_Neighbour_logo" class="logo" style="width:150px" ; "height:150px" ;>
    <hr />
    <p>&copy;2023 Privacy-Terms</p>
  </footer>
</body>

</html>