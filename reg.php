<?php 
include_once("db-config.php"); 

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Collect form data
   $name = $_POST["name"];
   $email = $_POST["email"];
   $password = $_POST["password"];
 
   // Hash password
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
   // Insert user into database
   $sql = "INSERT INTO users (name, user_email, password) VALUES ('$name', '$email', '$hashed_password')";
   $mysqli->query($sql);
 
   // Redirect to login page
   header("Location: login.php");
   exit();
 }
 ?>

<?php include_once("header.php"); ?>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">Registration Form</h4>
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once("footer.php"); ?>