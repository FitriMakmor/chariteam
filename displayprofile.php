<?php
include_once("scripts/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
   
    <title>Chariteam - Display Profile</title>
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
          <li class="nav-item"><a href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="login.php" class="nav-link">Log Out</a></li> 
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/volunteerheader.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="listvolunteer.html">Volunteers</a></span><span>Display Profile</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Volunteers</h1>
           
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-gallery">
    
<?php
      $v_ID=$_GET["v_ID"];
    $profile ="SELECT  * FROM volunteer WHERE volunteer_ID=:v_ID"; 

      $result = $pdo->prepare($profile); 
      $result -> execute(array(':v_ID'=>$v_ID));
      $row=$result->fetch(PDO::FETCH_ASSOC);
      $image=$row["v_image"];
      $imageType=$row["v_image_type"];
   ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group " style="margin-left: auto; margin-right: auto; text-align: center;">
         <img class="img-profile img-circle img-responsive center-block" style="margin-left: auto; margin-right: auto; text-align: center;border-radius: 50%;width:140px;height:140px"src="<?php echo 'data:'.$imageType.';base64,'.base64_encode($image).'';?>"alt="" width="90%" height="90%">
             <ul class="meta list list-unstyled">
               <br> <label class="label label-info" >Volunteer</label>
               <br> <p>
                <?php
                           
                    echo $row["v_publicInfo"];
                ?></p>

          </ul> 
          </div> 
    </div>
    
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Profile</h4>
		                    <hr>
		                </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                          <label>First Name</label>
                          
                        </div> 
                        <div class="col-8">
                            <h5> 
                             <?php
                           
                          echo $row["v_firstName"];
                             ?>
                             </h5><br>
                          </div>
                     </div>
                     <div class="row">
                        <div class="col-4">
                          <label>Last Name</label>
                        </div> 
                        <div class="col-8">
                            <h5>
                            <?php
                           
                           echo $row["v_lastName"];
                              ?>
                            </h5><br>
                          </div>
                     </div>
                     <div class="row">
                        <div class="col-4">
                          <label>Ic</label>
                        </div> 
                        <div class="col-8">
                            <h5>
                            <?php
                           
                           echo $row["v_IC"];
                              ?>
                            </h5><br>
                          </div>
                     </div>
                     <div class="row">
                        <div class="col-4">
                          <label>Email</label>
                        </div> 
                        <div class="col-8">
                            <h5>
                            <?php
                           
                           echo $row["v_email"];
                              ?>
                            </h5><br>
                          </div>
                     </div>
                     <div class="row">
                      <div class="col-4">
                        <label>Address Line 1</label>
                      </div> 
                      <div class="col-8">
                          <h5>
                          <?php
                           
                           echo $row["v_address1"];
                              ?>
                          </h5><br>
                        </div>
                   </div>
                   <div class="row">
                    <div class="col-4">
                      <label>Address Line 2</label>
                    </div> 
                    <div class="col-8">
                        <h5>
                        <?php
                           
                           echo $row["v_address2"];
                              ?>
                        </h5><br>
                      </div>
                 </div>
                 <div class="row">
                  <div class="col-4">
                    <label>State</label>
                  </div> 
                  <div class="col-8">
                      <h5>
                      <?php
                           
                           echo $row["v_state"];
                              ?>
                      </h5><br>
                    </div>
               </div>
               <div class="row">
                <div class="col-4">
                  <label>Status</label>
                </div> 
                <div class="col-8">
                    <h5><?php
                           
                           echo $row["v_status"];
                              ?></h5><br>
                  </div>
             </div>
                     <div class="row">
                        <div class="col-4">
                          <label>Tel</label>
                        </div> 
                        <div class="col-8">
                            <h5><?php
                           
                           echo $row["v_telNum"];
                              ?></h5><br>
                          </div>
                     </div>
                     <div class="row">
                        <div class="col-4">
                          <label>Occupation</label>
                        </div> 
                        <div class="col-8">
                            <h5><?php
                           
                           echo $row["v_occ"];
                              ?></h5><br>
                          </div>
                     </div>
                     <div class="row">
                        <div class="col-4">
                          <label>Date of Registration</label>
                        </div> 
                        <div class="col-8">
                            <h5><?php
                           
                           echo $row["v_DOR"];
                              ?></h5><br>
                          </div>
                     </div>
		           
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <form method ="post" action="editvolunteer.php?v_ID=<?php echo $v_ID;?>"> 
                          <button name="submit" type="submit" class="btn btn-primary">Edit Profile</button>
                       
                     </div>
                   </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
    </section>
<?php  $pdo=null;?>
    

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