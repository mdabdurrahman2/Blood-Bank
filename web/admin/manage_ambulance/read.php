<?php
if(isset($_GET["ambulance_id"]) && !empty(trim($_GET["ambulance_id"]))){
    require_once "config.php";
    
    $sql = "SELECT * FROM ambulance WHERE ambulance_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_ambulance_id);
        
        $param_ambulance_id = trim($_GET["ambulance_id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $ambulance_name = $row["ambulance_name"];
                $phone_number = $row["phone_number"];
                $city = $row["city"];
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
                        <label>Ambulance Name</label>
                        <p><b><?php echo $row["ambulance_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <p><b><?php echo $row["phone_number"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <p><b><?php echo $row["city"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-danger">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>