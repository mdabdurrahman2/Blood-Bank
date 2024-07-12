
<?php
    if(isset($_GET['token'])) {
        $token = $_GET['token'];

        $conn = new mySqli('localhost', 'root', '', 'blood_bank');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM signup_info WHERE token = '$token' and updatedTime >= NOW() - Interval 1 DAY");

        if($verifyQuery->num_rows == 0) {
            header("Location: \web\index.html");
            exit();
        }

        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];

            $changeQuery = $conn->query("UPDATE signup_info SET password = '$new_password' WHERE email = '$email' and token = '$token' and updatedTime >= NOW() - INTERVAL 1 DAY");

            if($changeQuery) {
                echo 'Successfully changed the password. Log in <a href = "/web/php/login.php">here</a>';
            }
        }
        $conn->close();
    }
    else {
        header("Location: \web\index.html");
        exit();
    }
?>