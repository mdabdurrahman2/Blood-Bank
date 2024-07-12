<?php
if(isset($_GET["donor_id"]) && !empty(trim($_GET["donor_id"]))){
    require_once "config.php";
    
    $sql = "SELECT * FROM signup_info WHERE donor_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_donor_id);
        
        $param_donor_id = trim($_GET["donor_id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $fullName = $row["fullName"];
                $email = $row["email"];
                $phoneNumber = $row["phoneNumber"];
                $city = $row["city"];
                $bloodGroup = $row["bloodGroup"];
                $gender = $row["gender"];
            }
            else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);
} else{
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="icon" href="/web/images/blood-donation.png" type="image/icon type" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Donor Name</label>
                        <p><b><?php echo $row["fullName"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p><b><?php echo $row["email"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <p><b><?php echo $row["phoneNumber"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <p><b><?php echo $row["city"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Blood Group</label>
                        <p><b><?php echo $row["bloodGroup"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>gender</label>
                        <p><b><?php echo $row["gender"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-danger">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>