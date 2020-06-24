<?php
// Include config file
include("scripts/config.php");
 
// Define variables and initialize with empty values
$email = $password =  "";
$emailErr = $password_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
  // Validate email
  if(empty(trim($_POST["email"]))){
    $emailErr = "Please enter a email.";
    echo '
    <script type="text/javascript">
        alert("*Please enter a email."); 
        window.location.href = "register.php";
    </script>';
  }else{
    $email = trim($_POST["email"]);
  }

  // Validate password
  if(empty(trim($_POST["password"]))){
      $password_err = "Please enter a password.";  
      echo '
        <script type="text/javascript">
            alert("*Please enter a password."); 
            window.location.href = "resetPassword.php";
        </script>';   
  } elseif(strlen(trim($_POST["password"])) < 6){
      $password_err = "Password must have at least 6 characters.";
      echo '
        <script type="text/javascript">
            alert("*Password must have at least 6 characters."); 
            window.location.href = "resetPassword.php";
        </script>';  
  } else{
      $password = trim($_POST["password"]);
  }
  

  // Validate credentials
  if(empty($emailErr) && empty($password_err)){

    // Prepare a select statement
    $sql = "SELECT u_email FROM user WHERE u_email = :email";
      
    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      
      // Set parameters
      $param_email = trim($_POST["email"]);
      
      // Attempt to execute the prepared statement
      if($stmt->execute()){
          // Check if username exists, if yes then update
          if($stmt->rowCount() == 1){
              
            // Prepare a select statement
            $sql = "UPDATE user SET user_password = :password WHERE u_email = :email";
              
            if($stmt = $pdo->prepare($sql)){
              // Bind variables to the prepared statement as parameters
              $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
              $stmt->bindParam(":email", $param_email, PDO::PARAM_STR); 

              // Set parameters
              $param_email = trim($_POST["email"]);
              $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

              // Attempt to execute the prepared statement
              if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
              } else{
                  echo "*Oops! Something went wrong. Please try again later.";
              }

                // Close statement
                unset($stmt);
            }
          } else{
              // Display an error message if username doesn't exist
              $emailErr = "*Email doest not exist.";
              echo '
              <script type="text/javascript">
                  alert("*Email doest not exist."); 
                  window.location.href = "resetPassword.php";
              </script>';
          }
      } else{
          echo "*Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt);
    }
  }
  
  // Close connection
  unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chariteam - Reset Password</title>
    <link rel="icon" href="images/620806.png" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" type="image/png" href="images/620806.png"> 
    
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style-login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <div class="hero-wrap" style="background-image: url('images/AdobeStock.jpeg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="headName">
      <h1><strong>CHARITEAM</strong></h1><img src="images/620806.png">
    </div>
    <div class="container2">
    <form class="password" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <h5><strong>Reset your password</strong></h5>
      <div  class="text-center">
        <p><small>Please enter your email and password to reset new password.</small></p>
      </div>
      <div class="textbox">
        <i class="fa fa-envelope-o"></i>
        <input type="email" placeholder="Enter email" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" id="password" name="password" value ="<?php echo $password; ?>" required>
        <span class="eye" onclick="myFunction()">
        <i id="hide1" class="fas fa-eye"></i>
        <i id="hide2" class="fas fa-eye-slash"></i>
        </span>
      </div>
      <div class="text-center"><button type="submit" class="btn btn3" id="button">RESET PASSWORD</button><br></div>
      <div class="backlink"><small>back to <a href="login.php">login </a>page</small></div>
    </form>
    </div>
    </div>


  <script>
    function myFunction(){
    var x = document.getElementById("password");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if(x.type === "password"){
      x.type = "text";
      y.style.display = "block";
      z.style.display = "none";
      }else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
    }
  </script>
  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>