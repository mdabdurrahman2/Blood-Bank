<?php
require_once "config.php";
 
$organization_name =  $phone_number  = $city =  "";
$organization_name_err  = $phone_number_err =  $city_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_organization_name = trim($_POST["organization_name"]);
    if(empty($input_organization_name)){
        $organization_name_err = "Please enter a name.";
    } elseif(!filter_var($input_organization_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $organization_name_err = "Please enter a valid name.";
    } else{
        $organization_name = $input_organization_name;
    }
    
    
    $input_phone_number = trim($_POST["phone_number"]);
    if (empty($input_phone_number)) {
        $phone_number_err = "Please enter the phone number.";
    } elseif (!preg_match('/^\d{11}$/', $input_phone_number)) {
        $phone_number_err = "Please enter a valid phone number with 11 digits.";
    } else {
        $phone_number = $input_phone_number;
    }

    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Select the city.";     
    }  else{
        $city = $input_city;
    }

    
    // Check input errors before inserting in database
    if(empty($organization_name_err)  && empty($phone_number_err)  && empty($city_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO organization (organization_name,phone_number,city) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_organization_name, $param_phone_number,  $param_city);
            
            // Set parameters
            $param_organization_name = $organization_name;
            $param_phone_number = $phone_number;
            $param_city = $city;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Update Record of organizations</h2>
                    <p>Please fill this form and submit to update organization record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Organization Name</label>
                            <input type="text" name="organization_name" class="form-control <?php echo (!empty($organization_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $organization_name; ?>">
                            <span class="invalid-feedback"><?php echo $organization_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone_number" class="form-control <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_number; ?>">
                            <span class="invalid-feedback"><?php echo $phone_number_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                            <span class="invalid-feedback"><?php echo $city;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-danger" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>