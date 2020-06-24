<?php
session_start();
$userID=$_SESSION["userID"];
include_once("scripts/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chariteam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
    
    <div class="hero-wrap" style="background-image: url('images/bg_vol1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="about.php">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">  
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex ftco-animate">
    				<div class="img img-about align-self-stretch" style="background-image: url(images/620806.png); width: 100%;"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 ftco-animate">
            <h1 class="mb-4">Welcome to Chariteam!</h1>
            <h4 class="mb-4">Established in 2020</h4>
    				<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
            <h5>Head Quarters</h5>
            <p>No. 39, Some Road Somewhere,
            <br>Off Teluk Whatever,
            <br>48900 A Place,
            <br>someState, Malaysia
            </p>
         
            <i class="fa fa-phone"><p>03-12345678</p></i>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Board of Directors</h2>
            <h5>The wonderful and amazing souls who founded Chariteam</h5>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate" style="height:180px">
        		<div class="staff">
        			<div class="d-flex mb-4" style="width: 300px;">
        				<div class="img" style="background-image: url(images/fitri.jpg);width:150px; height:130px"></div>
        				<div class="info ml-4">
        					<h3>Fitri Makmor</h3>
        					
        					<div class="text">
		        				<p>Co-Founder and CEO</p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate" style="height:180px">
        		<div class="staff">
        			<div class="d-flex mb-4" style="width: 300px;">
        				<div class="img" style="background-image: url(images/keertii.jpg); width:150px; height:130px"></div>
        				<div class="info ml-4">
        					<h3>Keerti Ravindran</h3>
        					
        					<div class="text">
		        				<p>Co-Founder and CEO</p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate" style="height:180px">
        		<div class="staff">
        			<div class="d-flex mb-4" style="width: 300px;">
        				<div class="img" style="background-image: url(images/atiqah.jpg); width:150px; height:130px"></div>
        				<div class="info ml-4">
        					<h3>Atiqah Mohd Nor</h3>
        					
        					<div class="text">
		        				<p>Co-Founder and CEO</p>
		        			</div>
        				</div>
        			</div>
        		</div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate" style="height:180px">
        		<div class="staff">
        			<div class="d-flex mb-4" style="width: 300px;">
        				<div class="img" style="background-image: url(images/syahira.jpg);width:150px; height:130px"></div>
        				<div class="info ml-4">
        					<h3>Syahira Atirah</h3>
        					
        					<div class="text">
		        				<p>Co-Founder and CEO</p>
		        			</div>
        				</div>
        			</div>
        		</div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate" style="height:180px">
        		<div class="staff">
        			<div class="d-flex mb-4" style="width: 300px;">
        				<div class="img" style="background-image: url(images/jas.jpg);width:150px; height:130px"></div>
        				<div class="info ml-4">
        					<h3>Jaspreet Kaur</h3>
        					
        					<div class="text">
		        				<p>Co-Founder and CEO</p>
		        			</div>
        				</div>
        			</div>
        		</div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate" style="height:180px">
        		<div class="staff">
        			<div class="d-flex mb-4" style="width: 300px;">
        				<div class="img" style="background-image: url(images/wanii.jpeg);width:150px; height:130px"></div>
        				<div class="info ml-4">
        					<h3>Norsyazwani Fadzil</h3>
        					
        					<div class="text">
		        				<p>Co-Founder and CEO</p>
		        			</div>
        				</div>
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
              <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
              <li class="nav-item"><a href="projects.php" class="nav-link">Projects</a></li>
              <li class="nav-item"><a href="listvolunteer.php?page=1" class="nav-link">Volunteers</a></li>
              <li class="nav-item active"><a href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>" class="nav-link">Profile</a></li>
              <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li> 
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>