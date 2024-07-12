<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="icon" href="/web/images/blood-donation.png" type="image/icon type" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .wrapper {
            width: 80%;
            margin: 0 auto;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            color: #333;
            margin-bottom: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #c82333;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        h2 {
            color: #dc3545;
        }

        .alert {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Donors List</h2>
                    </div>
                    <div class="row">
                        <?php
                        require_once "C:/xampp/htdocs/web/php/databse.php";
                        
                        $sql = "SELECT fullName,phoneNumber,city,bloodGroup,gender FROM signup_info";
                        if($result = mysqli_query($con, $sql)){
                            while($row = mysqli_fetch_array($result)){
                                echo '<div class="col-md-4">';
                                echo '<div class="card">';
                                echo '<div class="card-body">';
                                echo '<p class="card-text">Donor Name: ' . $row['fullName'] . '</p>';
                                echo '<p class="card-text">Phone number: ' . $row['phoneNumber'] . '</p>';
                                echo '<p class="card-text">City: ' . $row['city'] . '</p>';
                                echo '<p class="card-text">Blood Group: ' . $row['bloodGroup'] . '</p>';
                                echo '<p class="card-text">Gender: ' . $row['gender'] . '</p>';
                                echo '<div class="btn-group">';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                        
                        // Close connection
                        mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
