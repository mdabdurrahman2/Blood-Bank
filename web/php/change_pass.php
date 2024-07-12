

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password | Donate Blood, Save Lives</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-5 border p-4 rounded shadow">
        <h2 class="text-center text-primary mb-3">Change Your Password</h2>
        <p class="text-center mb-4">Continue giving the gift of life with a secure account. Update your password here.</p>

        <form action="" method="post">
          <div class="mb-3">
            <label for="email" class="form-label text-primary">Email Address:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your registered email address" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label text-primary">New Password:</label>
            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password" required>
          </div>
          <div class="mb-3">
            <label for="confirm_new_password" class="form-label text-primary">Confirm New Password:</label>
            <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="Re-enter your new password" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="change">Change Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
