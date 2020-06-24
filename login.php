<?php
// Initialize the session
session_start();

// Include config file
include("scripts/config.php");
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "*Please enter username.";
        echo '
        <script type="text/javascript">
            alert("*Please enter username"); 
            window.location.href = "login.php";
        </script>';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "*Please enter your password.";
        echo '
        <script type="text/javascript">
            alert("*Please enter your password."); 
            window.location.href = "login.php";
        </script>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userID, username, user_password FROM user WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["userID"];
                        $username = $row["username"];
                        $hashed_password = $row["user_password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userID"] = $id;
                            $_SESSION["username"] = $username;    
                            
                            if(!empty($_POST["remember"])) {
                                setcookie ("username",$_POST["username"],time()+ 3600);
                                setcookie ("password",$_POST["password"],time()+ 3600);
                                echo "Cookies Set Successfuly";
                            } else {
                                setcookie("username","");
                                setcookie("password","");
                                echo "Cookies Not Set";
                            }
                        
                            // Redirect user to about page
                            header("location: about.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "*The password you entered was not valid.";
                            echo '
                            <script type="text/javascript">
                                alert("*The password you entered was not valid."); 
                                window.location.href = "login.php";
                            </script>';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "*No account found with that username.";
                    echo '
                    <script type="text/javascript">
                        alert("*No account found with that username."); 
                        window.location.href = "login.php";
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
    
    <title>Chariteam - Login</title>
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
    
    <div class="hero-wrap" style="background-image: url('images/monk.jpg');">
    <div class="overlay"></div>
    <div class="headName">
    <h1><strong>CHARITEAM</strong></h1><img src="images/620806.png">
    </div>
    <!-- <?php
    // if(isset($_SESSION['message'])){
    //   echo $_SESSION['message'];
    //   unset($_SESSION['message']);
    ?> -->
    <div class="container1">
    <script></script>
    <form class="login-box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h1><strong>LOGIN</strong></h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" id="name" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"];} ?>" require>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];}  ?>" require>
            <span class="eye" onclick="myFunction()">
            <i id="hide1" class="fas fa-eye"></i>
            <i id="hide2" class="fas fa-eye-slash"></i>
            </span>
        </div>
        <input class="checkbox" type="checkbox" checked="checked" name="remember"/>
        <label><small><span>Remember me</span></small></label>
        
        <div class="pass"><small><a href="resetPassword.php">Forgot Password?</a></small></div>
        <div class="text-center" ><button class="btn btn3" id="button"  type="submit" name="login_btn">Sign In</button></div><br>
        <div class="text-center">
            <div class="register"><small>Dont have an account?<a href="register.php"> Register here</a></small></div>
        </div>
    </form>
    </div>
    </div>

  <script src="js/loginJavaScript.js"></script>

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