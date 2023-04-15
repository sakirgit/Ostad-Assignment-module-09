<?php 

session_start();
include_once("db-config.php"); 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard/dashboard.php");
    exit;
}

$email = $password = "";
$email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($email_err) && empty($password_err)){
        $sql = "SELECT id, name, user_email, password FROM users WHERE user_email = ?";

        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if($stmt->execute()){
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $stmt->bind_result($id, $name, $email, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;
                            header("location: dashboard/dashboard.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    $mysqli->close();
}
?>

 <?php include_once("header.php"); ?>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">Login Form</h4>
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
  <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
            </form>
            
            <?php
            // Show error message if there is one
            if (isset($error_message)) {
               echo "<p>$error_message</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
<?php include_once("footer.php"); ?>





