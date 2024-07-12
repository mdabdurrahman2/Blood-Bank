<?php
include("C:/xampp/htdocs/web/php/databse.php");
session_start();

if (isset($_POST['submitButton'])) {

  $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $dateOfBirth = mysqli_real_escape_string($con, $_POST['dateOfBirth']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $bloodGroup = mysqli_real_escape_string($con, $_POST['bloodGroup']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Check for existing email
  $sql = "SELECT email FROM signup_info WHERE email='$email'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
    header("refresh:0;url=login.php");
  } else {
    $sql = "INSERT INTO signup_info (fullName, email, dateOfBirth, gender, bloodGroup, city, phoneNumber, password) VALUES ('$fullName', '$email', '$dateOfBirth', '$gender', '$bloodGroup', '$city', '$phoneNumber', '$hashedPassword')";

    if (mysqli_query($con, $sql)) {
      $donorId = mysqli_insert_id($con);
      echo "<center><h3><script>alert('Congrats.. You have successfully registered with ID: $donorId !!');</script></h3></center>";
      header('location: /web/php/login.php?q=1');
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/web/images/blood-donation.png" type="image/icon type" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="/web/css/signup.css">
  <title>Sign Up | Be a Hero, Donate Blood</title>
</head>
<body>
  <form action="signup.php" method="post">
  <div class="signup-box">
    <div class="signup-header">
      <header class="mt">Join the Blood Donation Drive</header>
      <p>Be a hero, donate blood and save lives.</p>
    </div>

    <div class="input-box">
      <i class="fa fa-user icon"></i>
      <input type="text" id="fullName" name = "fullName" class="input-field" placeholder="Enter your full name" required autocomplete="off" pattern="[A-Za-z/\s]+" title="Only lower and upper case and space is allowed">
    </div>

    <div class="input-box">
      <i class="fa fa-envelope icon"></i>
      <input type="email" id="email" name="email" class="input-field" placeholder="Enter your valid email address" required autocomplete="off" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/." title="Please write valid email">
    </div>
    
    <div class="input-box">
      <i class="fa fa-calendar icon"></i>
      <input type="date" id="dateOfBirth" name="dateOfBirth" class="input-field" placeholder="Enter your date of birth" required autocomplete="off">
    </div>
    
    <div class="input-box">
      <i class="fa fa-venus-mars icon"></i>
      <select id="gender" name="gender" class="input-field" required autocomplete="off">
        <option value="">Select your gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>

    <div class="input-box">
      <i class="fa fa-heartbeat icon"></i>
      <select id="bloodGroup" name="bloodGroup" class="input-field" required autocomplete="off">
        <option value="">Select your blood group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
      </select>
    </div>
    
    <div class="input-box">
      <i class="fa fa-map-marker icon"></i>
      <select  name="city" id="city" class="input-field" required>
        <option value=""> Select your District </option>
        <option value="bagerhat">Bagerhat</option>
        <option value="bandarban">Bandarban</option>
        <option value="barguna">Barguna</option>
        <option value="barisal">Barisal</option>
      <option value="bhola">Bhola</option>
      <option value="bogura">Bogura</option>
      <option value="brahmanbaria">Brahmanbaria</option>
      <option value="chandpur">Chandpur</option>
      <option value="chattogram">Chattogram</option>
      <option value="chuadanga">Chuadanga</option>
      <option value="comilla">Comilla</option>
      <option value="coxs-bazar">Cox's Bazar</option>
      <option value="dhaka">Dhaka</option>
      <option value="dinajpur">Dinajpur</option>
      <option value="faridpur">Faridpur</option>
      <option value="feni">Feni</option>
      <option value="gaibandha">Gaibandha</option>
      <option value="gazipur">Gazipur</option>
      <option value="gopalganj">Gopalganj</option>
      <option value="habiganj">Habiganj</option>
      <option value="jamalpur">Jamalpur</option>
      <option value="jashore">Jashore</option>
      <option value="jhalokathi">Jhalokathi</option>
      <option value="jhenaidah">Jhenaidah</option>
      <option value="joypurhat">Joypurhat</option>
      <option value="khagrachhori">Khagrachhori</option>
      <option value="khulna">Khulna</option>
      <option value="kishoreganj">Kishoreganj</option>
      <option value="kurigram">Kurigram</option>
      <option value="kushtia">Kushtia</option>
      <option value="lakshmipur">Lakshmipur</option>
      <option value="lalmonirhat">Lalmonirhat</option>
      <option value="madaripur">Madaripur</option>
      <option value="magura">Magura</option>
      <option value="manikganj">Manikganj</option>
      <option value="meherpur">Meherpur</option>
      <option value="moulvibazar">Moulvibazar</option>
      <option value="munshiganj">Munshiganj</option>
      <option value="mymensingh">Mymensingh</option>
      <option value="naogaon">Naogaon</option>
      <option value="narail">Narail</option>
      <option value="narayanganj">Narayanganj</option>
      <option value="narsingdi">Narsingdi</option>
      <option value="natore">Natore</option>
      <option value="netrakona">Netrakona</option>
      <option value="nilphamari">Nilphamari</option>
      <option value="noakhali">Noakhali</option>
      <option value="pabna">Pabna</option>
      <option value="panchagarh">Panchagarh</option>
      <option value="patuakhali">Patuakhali</option>
      <option value="pirojpur">Pirojpur</option>
      <option value="rajbari">Rajbari</option>
      <option value="rajshahi">Rajshahi</option>
      <option value="rangamati">Rangamati</option>
      <option value="rangpur">Rangpur</option>
      <option value="satkhira">Satkhira</option>
      <option value="sherpur">Sherpur</option>
      <option value="sirajganj">Sirajganj</option>
      <option value="sunamganj">Sunamganj</option>
      <option value="sylhet">Sylhet</option>
      <option value="tangail">Tangail</option>
      <option value="thakurgaon">Thakurgaon</option>
    </select>
  </select>
</div>

<div class="input-box">
  <i class="fa fa-phone icon"></i>
  <input type="tel" id="phoneNumber" name="phoneNumber" class="input-field" placeholder="Enter your phone number" required autocomplete="off" pattern="^\d{11}$" title="11 numeric characters only" maxlength="11">
</div>

<div class="input-box">
        <span class="icon">
          <i class="fas fa-lock"></i>
        </span>
        <input name="password" type="password" value="" class="input form-control" id="password" placeholder="Create a strong password" required autocomplete="off" pattern="{8,}" title = "Password must be minimum 8 digits"/>
        <div class="input-box-append">
          <span class="input-box-text" onclick="password_show_hide();">
            <i class="fas fa-eye" id="show_eye"></i>
            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
          </span>
        </div>
 </div>

<div class="input-submit">
  <input type="submit" class="submit-btn" name ="submitButton" id="submitButton" value="Become a Blood Donor" required>
</div></form>

<div class="sign-up-link">
  <p>Already a member? <a href="/web/php/login.php">Sign In</a></p>
    </div>
  </div>
  <script src="/web/js/script.js"></script>
</body>
</html>


