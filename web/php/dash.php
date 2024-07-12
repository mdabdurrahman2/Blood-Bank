<?php

include("C:/xampp/htdocs/web/php/databse.php");
session_start();

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit;
}

// Close database connection
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="dashboard">
<h1>Dashboard</h1>

<div class="widgets">
  <div class="widget">
    <h2>Total Registered Users</h2>
    <p><?php echo $totalUsers; ?></p>
  </div>

  <div class="widget">
    <h2>Total Blood Donations</h2>
    <p><?php echo $totalDonations; ?></p>
  </div>

  <div class="widget">
    <h2>Total Blood Bags Collected</h2>
    <p><?php echo $totalBloodBags; ?></p>
  </div>

  <div class="widget">
    <h2>Most Common Blood Group</h2>
    <p><?php echo $mostCommonBloodGroup; ?></p>
  </div>
</div>

<h2>Latest Blood Donations</h2>
<table>
  <tr>
    <th>Donor Name</th>
    <th>Blood Group</th>
    <th>City</th>
    <th>Donation Date</th>
  </tr>

  <?php foreach ($latestDonations as $donation): ?>
  <tr>
    <td><?php echo $donation['donorName']; ?></td>
    <td><?php echo $donation['bloodGroup']; ?></td>
    <td><?php echo $donation['city']; ?></td>
    <td><?php echo $donation['donation_date']; ?></td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
</body>
</html>