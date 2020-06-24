<?php
session_start();
$userID=$_SESSION["userID"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chariteam - Add Report</title>
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
            <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/report1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                  href="projects.php">Projects</a></span><span>Add Report</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Add Meeting Report</h1>
          </div>
        </div>
      </div>
    </div>

    <?php
      include_once("scripts/config.php");
      $project_ID = $_GET["project_ID"];
    ?>
<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-8 pr-md-5">
          <h4 class="mb-4" style="font-weight: bold;">Meeting Details</h4>
          <form method="post" action="scripts/add_report.php?project_ID=<?php echo $project_ID?>">
            <div class="form-group">
              <p>Report Name*</p>
              <input name="reportName" type="text" class="form-control" placeholder="Meeting Minute 1" required>
            </div>
            <div class="form-group">
              <p>Purpose*</p>
              <input name="purpose" type="text" class="form-control" maxlength="70" placeholder="To discuss.." required>
            </div>
            <div class="form-group">
              <p>Date of Meeting*</p>
              <input name="date" type="date" class="form-control" placeholder="Date of Meeting" required>
            </div>
            <div class="form-group">
              <p>Venue*</p>
              <input name="venue" type="text" class="form-control" placeholder="Main Room 1" required>
            </div>
            <div class="form-group">
              <p>Start Time*</p>
              <input name="startTime" type="time" class="form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <p>End Time*</p>
              <input name="endTime" type="time" class="form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <p>Content of Meeting*</p>
              <textarea name="content" cols="30" rows="6" maxlength="1000" class="form-control" required ></textarea>
            </div>
            <div class="form-group">
              <p>Name of Participants*</p>
              <textarea name="comments" class="form-control" cols="30" rows="2" maxlength="200" required></textarea>
            </div>
            <div class="text">
              <!--<p>Meeting Report File (PDF format) *</p>
              <input name="file" type="file" id="myFile" name="filename2" accept="application/pdf" required>-->
              <div class="mt-3">
                <button name="submit" type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
          </form>
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
    
  <?php
  if ($_GET["np"] == "fail") {
    echo "<script>alert(\"Error in adding report!\")</script>";
  }
  ?>
  </body>
</html>