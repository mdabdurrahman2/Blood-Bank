<?php
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\web\mail\Exception.php';
    require 'C:\xampp\htdocs\web\mail\PHPMailer.php';
    require 'C:\xampp\htdocs\web\mail\SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'bloodbank768@gmail.com';                     // SMTP username
        $mail->Password   = 'Abdur Rahman13';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        
        //Recipients
        $mail->setFrom('bloodbank768@gmail.com', 'Admin');
        $mail->addAddress($email);     // Add a recipient

        $token = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="http://localhost/web/php/change_pass.php?token='.$token.'">here </a>. </br>Reset your password.';

        $conn = new mySqli('localhost', 'root', '', 'blood_bank');

        if($conn->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $conn->query("SELECT * FROM signup_info WHERE email = '$email'");

        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE signup_info SET token = '$token' WHERE email = '$email'");
                
            $mail->send();
            echo 'Message has been sent, check your email';
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/images/blood-donation.png" type="image/icon type"/>
  <title>Forgot Password | Donate Blood, Save Lives</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-5 border p-4 rounded shadow">
        <h2 class="text-center text-danger mb-3">Reset Your Password</h2>
        <p class="text-center mb-4">Your blood donation is vital, but so is your account security. Recover your password here.</p>

        <form action="" method="post">
          <div class="mb-3">
            <label for="email" class="form-label text-danger">Email Address:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your registered email address" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger" name="reset">Reset Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
