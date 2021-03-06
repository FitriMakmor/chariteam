<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Chariteam - Add a Project</title>
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
  <link rel="stylesheet" href="css/custom.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="projects.php">Chariteam</a>
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

  <div class="hero-wrap" style="background-image: url('images/prj_2dark.jpg');;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="projects.php">Projects</a></span><span>Add Project</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Add a new Project</h1>
        </div>
      </div>
    </div>
  </div>



  <section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <div class="row block-9">
        <h2>Add a Project</h2>
        <div class="col-md-12 px-4 bg-warning rounded shadow-lg">
          <form method="POST" class="mt-5 text-dark font-weight-bold" action="scripts/add_project.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="projectNameInput">Project Name</label>
              <input name="projectName" id="projectNameInput" type="text" maxlength ="35" class="form-control" placeholder="Project Name" required>
            </div>
            <div class="form-group">
              <label for="startInput">Project Starting Date</label>
              <input name="startDate" id="startInput" type="date" class="form-control" placeholder="Start Date" required>
            </div>
            <div class="form-group">
              <label for="endInput">Project Ending Date</label>
              <input name="endDate" id="endInput" type="date" class="form-control" placeholder="End Date" required>
            </div>
            <div class="form-group">
              <label for="summaryInput">Summary</label>
              <textarea name="summary" id="summaryInput" cols="30" rows="2" maxlength="100" class="form-control" placeholder="Project Summary" required></textarea>
            </div>
            <div class="form-group">
              <label for="descriptionInput">Description</label>
              <textarea name="description" id="descriptionInput" cols="30" rows="6" maxlength="1000" class="form-control" placeholder="Detailed Project Description" required></textarea>
            </div>
            <div class="form-group">
              <label for="projectImageForm">Insert Project Image</label>
              <input name="image" type="file" class="form-control-file" id="projectImageForm" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Add Project" class="btn btn-primary py-3 px-5">
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
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


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
  <script src="js/addProject.js"></script>
  <?php
  if ($_GET["np"] == "fail") {
    echo "<script>alert(\"Adding project failed: missing credentials!\")</script>";
  }
  ?>
</body>

</html>