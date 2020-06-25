<?php
session_start();
$userID=$_SESSION["userID"];

include_once("scripts/config.php");
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
//include_once("config.php");						

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
      <a class="navbar-brand" href="about.php">Chariteam</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="projects.php" class="nav-link">Projects</a></li>
          <li class="nav-item"><a href="listvolunteer.php?page=1" class="nav-link">Volunteers</a></li>
          <li class="nav-item active"><a href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li> 
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    <?php

   if (isset($_SESSION['loggedin']) && $_SESSION['userID'] && $_SESSION['username'] && $_SESSION['loggedin']==true ){
      try {
          $pdo->beginTransaction();
          $userID=$_SESSION["userID"];
          $sql2 = "SELECT * FROM user WHERE userID='$userID'";
          $result = $pdo->query($sql2); 
          //$result ->execute(array(':userID'=>$userID));
          $res=$result->fetch();
          $username = $res['username'];	
          $u_name = $res['u_name'];
          $u_telNum = $res['u_telNum'];
          $u_bio = $res['u_bio'];
          $u_DOB = $res['u_DOB'];
          $u_email = $res['u_email'];	
          $u_IC= $res['u_IC'];
         // $u_image = $res['u_image'];
          $dateJoined = $res['dateJoined'];
          $image=$res["u_image"];
          $imageType=$res["u_imageType"];
        


        ?>
    
     
    <div class="hero-wrap" style="background-image: url('images/bg_UP1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
              <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="userProfileMain.php?userID<?php echo $_SESSION['userID']?>">Profile</a></span></p>
              <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Overview</h1>
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
                    <li class="nav-item"><a class="nav-link px-2 active" href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                    <li class="nav-item"><a class="nav-link px-2" href="userProfileEdit.php?userID=<?php echo $_SESSION['userID'] ?>"><i class="fa fa-fw fa-cog mr-1"></i><span>Edit Profile</span></a></li>
                  </ul>
                </div>
              </div>
             <br> 
          </div>

        

        <div class="col ftco-animate" >
            <div class="row">
            <div class="col mb-3">
                <div class="card">
                <div class="card-body">
                    <div class="e-profile">
                    <div class="row">
                        <div class="col-12 col-sm-auto mb-3">
                        <div class="mx-auto" style="width: 150px;">
                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 150px;">
                              <img alt="" src="<?php echo 'data:'.$imageType.';base64,'.base64_encode($image).'';?>" style="width:150px;height:150px;" >
                            
                            </div>
                        </div>
                        </div>
                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $u_name ?></h4>
                    <p class="mb-0">@<?php echo $username ?></p>
                    <!--div class="text-muted"><small>Last seen 2 hours ago</small></div-->
                   
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">Project Manager</span>
                    <div class="text-muted"><small>Joined <?php echo $dateJoined?></small></div>
                  </div>
                    </div>
                    </div>
                    
                    <div class="tab-content pt-3">
                        <div class="tab-pane active">
                          <br>
                          <div class="row">
                            <div class="col-4">
                           <label><b>About</b></label>
                            </div> 
                            <div class="col-8">
                                <h5><?php echo $u_bio; ?></h5><br>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-4">
                                <label>Email</label>
                                </div> 
                                <div class="col-8">
                                    <h5><?php echo $u_email; ?></h5><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <label>Mobile Number</label>
                                </div> 
                                <div class="col-8">
                                    <h5><?php echo $u_telNum; ?></h5><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <label>IC num</label>
                                </div> 
                                <div class="col-8">
                                    <h5><?php echo $u_IC; ?></h5><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <label>Date of Birth</label>
                                </div> 
                                <div class="col-8">
                                    <h5><?php echo $u_DOB; ?></h5><br>
                                </div>
                            </div>

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
                </div>
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
                    if (event.target == modalA) {
                      modalA.style.display = "none";
                    }
                  }
                  </script>
            </div>
            </div>

        </div>
        </div>
        </div>
      <?php
      
    
      } catch (Exception $e) {
          echo "Error: " . $e;
        }
   }
        $pdo = null;
        ?>
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
              <li><a href="logout.php" class="py-2 d-block">Log Out</a></li>
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