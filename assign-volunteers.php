<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chariteam - Assign Volunteers </title>
    <link rel="icon" href="images/620806.png" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Search Bar -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
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
    <!-- css Syahira -->
    <link rel="stylesheet" href="css/style-assign.css">
  </head>

  <body>
    <!-- START nav -->
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
    
    <div class="hero-wrap" style="background-image: url('images/bg_vol1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                  href="projects.html">Projects</a></span><span>Assign Volunteers </span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Assign Volunteers </h1>
          </div>
        </div>
      </div>
    </div>

    <!-- START name list -->
    <section class="ftco-section">

    <?php
              include_once("scripts/config.php");
              $projectID = $_GET["project_ID"];
              try {
                $pdo->beginTransaction();
                $sql2 = "SELECT volunteer_ID, v_image, v_image_type, v_firstName, v_lastName, v_state FROM volunteer WHERE volunteer_ID NOT IN 
                (SELECT volunteer_ID FROM project_volunteer WHERE project_volunteer.project_ID=".$projectID.') ';  
                
                $result2 = $pdo -> query($sql2);
                //echo "all records selected successfully.";
                $pdo->commit();
              
          
          ?>
          
      <div class="container">
        <div class="wrapper">
          <!-- Search Bar -->
          <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
              <div class="searchbar">
                <input id="myInput" onkeyup="myFunction()" class="search_input" type="text" name="" placeholder="Search for name">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
          <br>

          

          <!-- START table -->
          <table id="myTable" class="table table-striped table-dark table-hover">
            <form method="GET" action="scripts/assign-volunteer.php">
            <thead class="thead">
              <tr>
                <th scope="col" class="text-center">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">State</th>
                <th scope="col">Add</th>
              </tr>
            </thead>

            <?php
                while($data = $result2 -> fetch())  {
                  $id = $data["volunteer_ID"];
                  $image = $data["v_image"];
                  $imageType = $data["v_image_type"];
            ?>
          
              <tbody>
                <tr>
                  <th scope="row"><img src="<?php echo 'data:' . $imageType . ';base64,' . base64_encode($image) . '';?>" class="mx-auto d-block"></th>
                  <td><a href="displayprofile.html"><?php echo $data["v_firstName"] . " " . $data["v_lastName"]; ?></a></td>
                  <td><?php echo $data["v_state"]; ?></td>
                  <td><label class="switch "><input type="checkbox" value="<?php echo $id; ?>" name="selected[]" class="success" /><span class="slider round"></span></label></td>
                  <td class="hidden"><label class="switch hidden"><input type="checkbox" value="<?php echo $projectID; ?>" name="projectID" class="hidden" checked="yes"/></label></td>
                </tr>
                <?php } ?>
              </tbody>
              
              
            </table>
        </div>
      </div>
    </section>
    <!-- END name list -->

    <?php
    } catch (Exception $e) {
      $pdo->rollback();
      echo "Error: ".$e;
    }
    $pdo = null;
?>

    <section class="ftco-section-3 img" style="background-image: url(images/bg_3.jpg);">
      <div class="overlay"></div>
      <!-- add selected volunteers button -->
        <div class="container">
          <div class="row d-md-flex">
          <div class="box">
            <a href="#" type="button" name="btn-asign" id="btn-assign" class="btn btn-white btn-animation-1" data-toggle="modal" data-target="#exampleModal"> Confirm to add these selected volunteers? </a> 
          </div>   			
          </div>
        </div>
        </section>

        <!-- ADD modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure want to add these volunteers to this project?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                <button type="submit" class="btn btn-primary" name="submit"> Confirm </button>
              </div>
            </div>
          </div>
        </div>
    
        </form>


    
		
    <!-- START footer -->
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
  <!-- js Syahira -->
  <script src="js/assign-volunteers.js"></script>
    
  </body>
</html>

