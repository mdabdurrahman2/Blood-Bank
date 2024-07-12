<?php

include("C:/xampp/htdocs/web/php/databse.php");
session_start();

if (isset($_POST['submitButton'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $str = "SELECT * FROM admin_log WHERE email='$email'";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['email'] = $row['email'];
      $_SESSION['isLoggedIn'] = true;

      header('location: /web/admin/admin_dashboard.php');
      exit;
    } else {
      echo "<center><h3><script>alert('Invalid password!');</script></h3></center>";
    }
  } else {
    echo "<center><h3><script>alert('Invalid email or password!');</script></h3></center>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/web/images/blood-donation.png" type="image/icon type"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="/web/css/login.css">
  <title>Admin Login | Dhaka Blood Bank</title>
</head>
<body>
  <form action="" method="post">
    <div class="login-box">
        
      <div class="login-header">
        <header>Admin Login</header>
      </div>
      <div class="input-box">
        <i class="fa fa-envelope icon"></i>
        <input type="email" id="email" class="input-field form-control" name="email" placeholder="Enter your email address" required autocomplete="off">
      </div>
      <div class="input-box mb-3">
        <span class="icon">
          <i class="fas fa-lock"></i>
        </span>
        <input name="password" type="password" value="" class="input form-control" id="password" placeholder="Enter your password" required="true"/>
        <div class="input-box-append">
          <span class="input-box-text" onclick="password_show_hide();">
            <i class="fas fa-eye" id="show_eye"></i>
            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
          </span>
        </div>
      </div>
      <div class="input-submit">
        <button type="submit" id="submitButton" name="submitButton" class="submit-btn">Sign In</button>
      </div>
    </div>
  </form>
<script src="/web/js/script.js"></script>
</body>
</html>