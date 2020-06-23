<?php
session_start();
$userID=$_SESSION["userID"];
include_once("scripts/config.php");


$nameErr = $telNumErr = $emailErr = "";
     $u_name = $u_telNum = $u_email = "";
     
     if ($_SERVER["REQUEST_METHOD"] == "POST") {

       if (!empty($_POST["fullname"])) {
         
         $u_name = test_input($_POST["fullname"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z ]*$/",$u_name)) {
           $nameErr = "Only letters and white space allowed";
         }
       }
    
       if (!empty($_POST["telnum"])) {
        
         $u_telNum = test_input($_POST["telnum"]);
         // check if contact number is well-formed
         if (!preg_match("/^(01)[0-46-9]*-[0-9]{7,8}$/",$u_telNum)) {
           $telNumErr = "Phone number should contain only numbers";
         }
       }

       $checkduplicate = $pdo->query("SELECT COUNT(*) FROM volunteer WHERE (v_IC='$v_IC') ");
        $dupe= $checkduplicate ->fetch();
        $count=$dupe[0];
          if($count>0){
            $errMSG ="IC already registered";

          }
   
       // Validate email
  if(empty(trim($_POST["email"]))){
    $emailErr = "Please enter a email.";
} else{
    // Prepare a select statement
    $sql = "SELECT userID FROM user WHERE u_email = :email";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":email", $u_email);
        
        // Set parameters
        $u_email = trim($_POST["email"]);
        
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

      /* if (empty($_POST["email"])) {
         $emailErr = "Email is required";
       } else {
         $u_email = test_input($_POST["email"]);
         // check if e-mail address is well-formed
         if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid email format";
         }
       }
       */
    
       if (empty($_POST["service"])) {
         $serviceErr = "Service is required";
       } else {
         $service = test_input($_POST["service"]);
       }
     
  

if(isset($_POST['update']))
{	
    //if($_POST['update'] == 'details'){
 // $userID =$_POST['userID'];	
  $username = $_POST['username'];	
  $u_name = $_POST['fullname'];
  $u_telNum = $_POST['telnum'];
  $u_bio = $_POST['bio'];
	$u_DOB = $_POST['dob'];
	$u_email = $_POST['email'];	
  $u_IC= $_POST['IC'];
 


  $userID=$_SESSION["userID"];  
  $stmt = $pdo->prepare ("UPDATE user SET username=:username, u_name=:fullname, u_telNum=:telnum, u_bio=:bio, u_DOB=:dob, u_email=:email, u_IC=:IC WHERE userID=:uid") ;
  
	$stmt->bindParam(':username',$username);
	$stmt->bindParam(':fullname',$u_name);
	$stmt->bindParam(':telnum',$u_telNum);
	$stmt->bindParam(':bio',$u_bio);	
	//$stmt->bindParam(':org',$org_ID);
	$stmt->bindParam(':dob',$u_DOB);
	$stmt->bindParam(':email',$u_email);
	$stmt->bindParam(':IC',$u_IC);
  //$stmt->bindParam(':imagefile',$u_image);
//  $stmt->bindParam(':u_image',$imageData);
//  $stmt->bindParam(':u_imageType',$imageProperties['mime']);
  $stmt->bindParam(':uid',$userID);
  


	if($stmt->execute()){
    header('Location:userProfileMain.php?userID='.$userID);
  }
  else{
	  echo "Error: ".$pdo->error."<br><br>";
  }
  
}

if(isset($_POST['updateimage'])){
  $imageData = addslashes(file_get_contents($_FILES['imagefile']['tmp_name']));
  $imageProperties = getimagesize($_FILES['imagefile']['tmp_name']);

  $userID=$_SESSION["userID"];  
  $stmt2 = $pdo->prepare ("UPDATE user SET  u_image='$imageData', u_imageType='{$imageProperties['mime']}' WHERE userID=:uid") ;

  $stmt2->bindParam(':uid',$userID);

  if($stmt2->execute()){
    header('Location:userProfileEdit.php?userID='.$userID);
  }
  else{
	  echo "Error: ".$pdo->error."<br><br>";
  }
}

     
}     
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


        
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chariteam - Profile</title>
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
    <link rel="stylesheet" href="css/DeleteProfileButton.css">
    <link rel="shortcut icon" type="image/png" href="images/620806.png">

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="projects.html">Chariteam</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="projects.php" class="nav-link">Projects</a></li>
          <li class="nav-item"><a href="listvolunteer.php?page=1" class="nav-link">Volunteers</a></li>
          <li class="nav-item active"><a href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="login.php" class="nav-link">Log Out</a></li> 
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_9.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="userProfileMain.php">Profile</a></span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Edit Profile</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
       <div class="container">
          <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3 ftco-animate" style="width: 200px;">
              <div class="card p-3">
                <div class="e-navlist e-navlist--active-bg">
                  <ul class="nav">
                    <li class="nav-item"><a class="nav-link px-2" href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                    <li class="nav-item"><a class="nav-link px-2 active" href="userProfileEdit.php?userID=<?php echo $_SESSION['userID'] ?>"><i class="fa fa-fw fa-cog mr-1"></i><span>Edit Profile</span></a></li>
                  </ul>
                </div>
              </div>
              <br> 
            </div>

    <?php

          $userID=$_SESSION["userID"];
          $sql2 = "SELECT * FROM user WHERE userID=:userID";
          $result = $pdo->prepare($sql2); 
          $result ->execute(array(':userID'=>$userID));
          $res=$result->fetch(PDO::FETCH_ASSOC);
          $image=$res["u_image"];
          $imageType=$res["u_imageType"];
          
         /*try {
        
            $pdo->beginTransaction();
            //$userID=$_GET["userID"];
            $sql2 = "SELECT * FROM user";
            $result = $pdo->query($sql2); 
            //$result ->execute(array(':userID'=>$userID));
            
            while($res=$result->fetch()){
            if ($res["userID"] == $_SESSION["userID"]){
            $username = $res['username'];	
            $u_name = $res['u_name'];
            $u_telNum = $res['u_telNum'];
            $u_bio = $res['u_bio'];
            $u_DOB = $res['u_DOB'];
            $u_email = $res['u_email'];	
            $u_IC= $res['u_IC'];
            $u_image = $res['u_image'];
            //$u_dateJoined = $res['u_dateJoined'];
*/

         ?> 
         
         <!--script type='text/javascript'>
function formValidator()
{
    // Make quick references to our fields
    alert("hiiiiiii");
    var fullname = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var telnum = document.getElementById('tel').value;

    if( fullname=="" || fullname==null)
     {
         alert("Please Enter user name");
         return false;
     }
     var alphaExp = /^[a-zA-Z]+$/;
     if(!name.match(alphaExp))
      {
          alert("please Enter only Alphabates for Name");
          return false;
      }

      if(email=="" || email=="null")
      {
          alert("Please Enter Email Address");
          return false;
      }
      var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
      if(!email.match(emailExp))
       {
           alert("please Enter valid email address");
            return false;
       }
       if(telnum=="" || telnum=="null")
       {
           alert("Please Enter Phone Number");
           return false;
       }
       var numericExpression = /^(01)[0-46-9]*-[0-9]{7,8}$/;
       if(!telnum.match(numericExpression))
       {
           alert("Enter only Digit for Phone Number");
           return false;
       }
       return true;
}
</script-->
      

  <div class="col ftco-animate">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 150px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 150px;">
                      <img src="<?php echo 'data:'.$imageType.';base64,'.base64_encode($image).'';?>" alt="" style="width:150px;height:150px;">
                    </div>
                  </div>
                </div>
                
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $res['u_name'];?></h4>
                    <p class="mb-0">@<?php echo $res['username']; ?></p>
                    <!--div class="text-muted"><small>Last seen 2 hours ago</small></div-->
                    <div class="mt-2">
                      <button class="btn btn-primary" type="button" onclick="document.getElementById('id02').style.display='block'">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                     
                      <div id="id02" class="modalB">
                        <form class="modal-content" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST" enctype="multipart/form-data">
                          <div class="containerhere">
                            
                              Select file : <input type='file' name='imagefile' id='file' class='form-control'><br>
                              <!--input type="hidden" name="updateimage" value="upload"-->
                              <input type="submit" onclick="document.getElementById('id02').style.display='none'" class='btn btn-info' name="updateimage" value="Upload" id='btn_upload'> &nbsp;
                              <input type="button" onclick="document.getElementById('id02').style.display='none'" class="btn btn-primary" value='Cancel'>
                            
                          </div>
                        </form>
                        
                      </div>

                      
                      <script>
                        // Get the modal
                        var modalB = document.getElementById('id02');
                        
                        // furthur javascript code to close modal is continued at Delete Button javascript below
                      </script>

                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">Project Manager</span>
                    <div class="text-muted"><small>Joined <!--?php echo $dateJoined?--></small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" id="name" type="text" name="fullname" placeholder="John Smith" value="<?php echo $res['u_name']; ?>"><span class="error">* <?php echo $nameErr;?>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" id="username" type="text" name="username" placeholder="johnny.s" value="<?php echo $res['username']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name='email' id="email" aria-describedby="emailHelp" placeholder="user@example.com" value="<?php echo $res['u_email']; ?>">
                             
                              <span class="help-block"><?php echo $emailErr; ?></span>
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea class="form-control" name='bio' rows="5" placeholder="My Bio" ><?php echo $res['u_bio']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="phone">Mobile Number</label>
                              <input type="tel" class="form-control" name="telnum" id="phone" placeholder="016-12345678" pattern="[0-9]{3}-[0-9]{7,8}" value="<?php echo $res['u_telNum']; ?>"> <span class="error"><?php echo $telNumErr;?>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>IC Number</label>
                              <input class="form-control" name='IC' id="IC" placeholder="123456-00-1234" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" value="<?php echo $res['u_IC']; ?>">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Date of Birth</label>
                              <input class="form-control" id="birthday" name='dob' type="date" value="<?php echo $res['u_DOB']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        
                        <button class="btn btn-primary" name="update" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
              <div class="px-xl-2">
              <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-block btn-primary">
                <i class="fa fa-trash" aria-hidden="true"></i>   
                  <span>Delete Account</span>
              </button>
              
          </div>
          <div id="id01" class="modalA">
            <form class="myModal-content" action="deleteUser.php?userID="<?php echo $_SESSION['userID'] ?>>
              <div class="containerhere">
                <h1>Delete Account</h1>
                <p>Are you sure you want to delete your account?</p>
              
                <div class="clearfix">
                  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                  <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
                </div>
              </div>
            </form>
          </div>
          <script>
            // Get the modal
            var modalA = document.getElementById('id01');
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              
              //for delete account
              if (event.target == modalA) {
                modalA.style.display = "none";
              }
              // for Change Photo
              if (event.target == modalB) {
                modalB.style.display = "none";
              }
            }
            </script>
      </div>
    </div>

  </div>
</div>
</div>
    </section>

    
		

    <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About Website</h2>
            <p>This is a simple and convenient system that helps Project Managers to manage their charity projects all in just one website</p>
          </div>
        </div>
        <div class="col-md-1"></div>
       
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Contact Us</h2>
            <p>No. 39, Some Road Somewhere,
            <br>Off Teluk Whatever,
            <br>48900 A Place,
            <br>someState, Malaysia
            </p>
            <p>03-12345678</p>
          </div>
        </div>
        <div class="cold-md-3"></div>
       
        <div class="col-md-2">
           <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Site Links</h2>
            <ul class="list-unstyled">
              <li><a href="about.php" class="py-2 d-block">About</a></li>
              <li><a href="projects.php" class="py-2 d-block">Projects</a></li>
              <li><a href="listvolunteer.php" class="py-2 d-block">Volunteers</a></li>
              <li><a href="userProfileMain.php?userID="<?php echo $_SESSION['userID'] ?> class="py-2 d-block">Profile</a></li>
              <li><a href="login.php" class="py-2 d-block">Log Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      
    </div>
  </footer>
    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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