<?php

require_once "config.php";

$fullName = $email = $gender = $bloodGroup = $city = $phoneNumber = "";
$fullName_err = $email_err = $gender_err = $bloodGroup_err = $phoneNumber_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate full name
    $input_fullName = trim($_POST["fullName"]);
    if (empty($input_fullName)) {
        $fullName_err = "Please enter your full name.";
    } elseif (!preg_match("/^[a-zA-Z. ]+$/", $input_fullName)) {
        $fullName_err = "Please enter a valid full name.";
    } else {
        $fullName = $input_fullName;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email address.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = $input_email;
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if (empty($input_gender)) {
        $gender_err = "Please select your gender.";
    } else {
        $gender = $input_gender;
    }

    // Validate blood group
    $input_bloodGroup = trim($_POST["bloodGroup"]);
    if (empty($input_bloodGroup)) {
        $bloodGroup_err = "Please select your blood group.";
    } else {
        $bloodGroup = $input_bloodGroup;
    }

    $input_city = trim($_POST["city"]);
    if (empty($input_city)) {
        $city_err = "Please enter your city.";
    } elseif (!preg_match("/^[a-zA-Z. ]+$/", $input_city)) {
        $city_err = "Please enter a valid full name.";
    } else {
        $city = $input_city;
    }

    // Validate phone number
    $input_phoneNumber = trim($_POST["phoneNumber"]);
    if (empty($input_phoneNumber)) {
        $phoneNumber_err = "Please enter your phone number.";
    } elseif (!preg_match("/^\d{11}$/", $input_phoneNumber)) {
        $phoneNumber_err = "Please enter a valid phone number.";
    } else {
        $phoneNumber = $input_phoneNumber;
    }

    // Check input errors before inserting into the database
    if (empty($fullName_err) && empty($email_err) && empty($gender_err) && empty($bloodGroup_err) && empty($city_err) && empty($phoneNumber_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO signup_info (fullName, email, gender, bloodGroup,city, phoneNumber) VALUES (?, ?, ?, ?, ?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_fullName, $param_email, $param_gender, $param_bloodGroup, $param_city, $param_phoneNumber);

            // Set parameters
            $param_fullName = $fullName;
            $param_email = $email;
            $param_gender = $gender;
            $param_bloodGroup = $bloodGroup;
            $param_city = $city;
            $param_phoneNumber = $phoneNumber;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to the landing page
                header("location: index.php");
                exit();
            } else {
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
        .wrapper {
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add donor record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullName" class="form-control <?php echo (!empty($fullName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullName; ?>">
                            <span class="invalid-feedback"><?php echo $fullName_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>">
                                <option value="" selected disabled>Select your gender</option>
                                <option value="Male" <?php if ($gender == 'Male') echo 'selected="selected"'; ?>>Male</option>
                                <option value="Female" <?php if ($gender == 'Female') echo 'selected="selected"'; ?>>Female</option>
                                <option value="Other" <?php if ($gender == 'Other') echo 'selected="selected"'; ?>>Other</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select name="bloodGroup" class="form-control <?php echo (!empty($bloodGroup_err)) ? 'is-invalid' : ''; ?>">
                                <option value="" selected disabled>Select your blood group</option>
                                <option value="A+" <?php if ($bloodGroup == 'A+') echo 'selected="selected"'; ?>>A+</option>
                                <option value="A-" <?php if ($bloodGroup == 'A-') echo 'selected="selected"'; ?>>A-</option>
                                <option value="B+" <?php if ($bloodGroup == 'B+') echo 'selected="selected"'; ?>>B+</option>
                                <option value="B-" <?php if ($bloodGroup == 'B-') echo 'selected="selected"'; ?>>B-</option>
                                <option value="O+" <?php if ($bloodGroup == 'O+') echo 'selected="selected"'; ?>>O+</option>
                                <option value="O-" <?php if ($bloodGroup == 'O-') echo 'selected="selected"'; ?>>O-</option>
                                <option value="AB+" <?php if ($bloodGroup == 'AB+') echo 'selected="selected"'; ?>>AB+</option>
                                <option value="AB-" <?php if ($bloodGroup == 'AB-') echo 'selected="selected"'; ?>>AB-</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $bloodGroup_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>"></div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phoneNumber" class="form-control <?php echo (!empty($phoneNumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phoneNumber; ?>">
                            <span class="invalid-feedback"><?php echo $city_err; ?></span>
                        </div>
                            <span class="invalid-feedback"><?php echo $phoneNumber_err; ?></span>
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
