<?php
include("C:/xampp/htdocs/web/php/databse.php");

// Check if a city parameter is provided in the POST request
$searchCity = isset($_POST['city']) ? $_POST['city'] : '';

// Use a prepared statement to prevent SQL injection
$sql = "SELECT fullName, phoneNumber, city, gender FROM signup_info WHERE city = ?";
if ($stmt = mysqli_prepare($con, $sql)) {
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $searchCity);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        // Check if there are results
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <?php echo $row['fullName']; ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Phone number: <?php echo $row['phoneNumber']; ?></p>
                            <p class="card-text">City: <?php echo $row['city']; ?></p>
                            <p class="card-text">Gender: <?php echo $row['gender']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-info">No donors found in the selected city.</div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

// Close the database connection
mysqli_close($con);
?>
