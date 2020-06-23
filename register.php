<?php
// Include config file
include("config.php");
 
// Define variables and initialize with empty values
$test = $username = $fullname = $email = $password = $confirm_password = "";
$username_err = $fullnameErr = $emailErr = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Validate username
  if(empty(trim($_POST["username"]))){
      $username_err = "Please enter a username.";
  } else{
      // Prepare a select statement
      $sql = "SELECT userId FROM user WHERE username = :username";
      
      if($stmt = $pdo->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
          
          // Set parameters
          $param_username = trim($_POST["username"]);
          
          // Attempt to execute the prepared statement
          if($stmt->execute()){
              if($stmt->rowCount() == 1){
                  $username_err = "This username is already taken.";
              } else{
                  $username = trim($_POST["username"]);
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }

          // Close statement
          unset($stmt);
      }
  }

  // Validate fullname
  if(empty(trim($_POST["fullname"]))){
      $fullnameErr = "Please enter a full name.";
  } else{
      $fullname = trim($_POST["fullname"]);
  }
  
  // Validate email
  if(empty(trim($_POST["email"]))){
      $emailErr = "Please enter a email.";
  }else{
    $test = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($test, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }else{
      // Prepare a select statement
      $sql = "SELECT userId FROM user WHERE u_email = :email";
      
      if($stmt = $pdo->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
          
          // Set parameters
          $param_email = trim($_POST["email"]);
          
          // Attempt to execute the prepared statement
          if($stmt->execute()){
              if($stmt->rowCount() == 1){
                  $emailErr = "This email is already taken.";
              } else{
                  $email = trim($_POST["email"]);
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }

          // Close statement
          unset($stmt);
      }
    }
  }

  // Validate password
  if(empty(trim($_POST["password"]))){
      $password_err = "Please enter a password.";     
  } elseif(strlen(trim($_POST["password"])) < 6){
      $password_err = "Password must have at least 6 characters.";
  } else{
      $password = trim($_POST["password"]);
  }
  
  // Validate confirm password
  if(empty(trim($_POST["password2"]))){
      $confirm_password_err = "Please repeat password.";     
  } else{
      $confirm_password = trim($_POST["password2"]);
      if(empty($password_err) && ($password != $confirm_password)){
          $confirm_password_err = "Password did not match.";
      }
  }

  if(empty($username_err) && empty($fullnameErr) &&empty($emailErr) && empty($password_err) && empty($confirm_password_err)){
        
    // Prepare an insert statement
    $sql = "INSERT INTO user (username, user_password, u_name,u_telNum, u_email, u_IC, u_bio, u_DOB, u_image, u_imageType, dateJoined) VALUES (:username, :password, :fullname, :tel, :email, :ic, :bio, :dob, :image, :imageType, :dateJoined)";
     
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
        $stmt->bindParam(":fullname", $param_fullname, PDO::PARAM_STR);
        $stmt->bindParam(":tel", $param_tel, PDO::PARAM_STR);
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $stmt->bindParam(":ic", $param_ic, PDO::PARAM_STR);
        $stmt->bindParam(":bio", $param_bio, PDO::PARAM_STR);
        $stmt->bindParam(":dob", $param_dob, PDO::PARAM_STR);
        $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);
        $stmt->bindParam(":imageType", $param_imageType, PDO::PARAM_STR);
        $stmt->bindParam(":dateJoined",$param_joined, PDO::PARAM_STR);
        
        // Set parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        $param_fullname = $fullname;
        $param_tel = "update";
        $param_email = $email;
        $param_ic = "update";
        $param_bio = "update";
        $param_dob = "update";
        $param_image = "update";
        $param_imageType = "update";
        $param_joined = date("Y-m-d");
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Redirect to login page
            header("location: login.php");
        } else{
            echo "Something went wrong. Please try again later.";
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
    <title>Chariteam - Register</title>
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
    <div class="hero-wrap" style="background-image: url('images/people.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="headName">
      <h1><strong>CHARITEAM</strong></h1><img src="images/620806.png">
    </div>
    <!-- <?php
      // if(isset($_SESSION['message'])){
      //   echo $_SESSION['message'];
      //   unset($_SESSION['message']);
      // }
    ?> -->
    <div class="container3">
    <div class="textbox" id = "errorMessage">
        <input type="hidden" >
        <small><?php echo $username_err; ?></small>
        <small><?php echo $fullnameErr; ?></small>
        <small><?php echo $emailErr; ?></small>
        <small><?php echo $password_err; ?></small>
        <small><?php echo $confirm_password_err; ?></small>
    </div>
    <form class="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form">
        <h1><strong>REGISTER</strong></h1>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Username" id="username" name="username" value="<?php echo $username; ?>" require>
        </div>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Full Name" id="fullname" name="fullname" value="<?php echo $fullname; ?>" require>
        </div>
        <div class="textbox">
          <i class="fa fa-envelope-o"></i>
          <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email; ?>" require>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" id="password" name="password" value="<?php echo $password; ?>" require>
          <span class="eye" onclick="myFunction()">
          <i id="hide1" class="fas fa-eye"></i>
          <i id="hide2" class="fas fa-eye-slash"></i>
          </span>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Repeat Password" id="password2" name="password2" value="<?php echo $confirm_password; ?>" require>
          <span class="eye" onclick="secFunction()">
          <i id="hide3" class="fas fa-eye"></i>
          <i id="hide4" class="fas fa-eye-slash"></i>
          </span>
      </div>
      <div class="text-center"><button type="submit" class="btn btn4" name="register_btn">Sign Up</button><br></div>
      <div>
          <div class="backlink"><small>Already have an account?<a href="login.php"> Sign In </a></small></div>
      </div>
    </form>
    </div>
    </div>

  <script src="js/regJavaScript.js"></script>
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