
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Chariteam - Assigned Volunteers </title>
    <link rel="icon" href="images/620806.png" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- delete icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    
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
            <li class="nav-item active"><a href="projects.html" class="nav-link">Projects</a></li>
            <li class="nav-item"><a href="meetingreport.html" class="nav-link">Reports</a></li>
            <li class="nav-item"><a href="listvolunteer.html" class="nav-link">Volunteers</a></li>
            <li class="nav-item"><a href="userProfileMain.html" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="login.html" class="nav-link">Log Out</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    
    
    <div class="hero-wrap" style="background-image: url('images/bg_vol2.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                  href="projects.html">Projects</a></span><span>Assigned Volunteers </span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Assigned Volunteers </h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    

    <?php
    include_once("scripts/config.php");
      try {
        
        $pdo->beginTransaction();
        $sql = "SELECT project_volunteer.project_ID, volunteer.volunteer_ID, volunteer.v_firstName, volunteer.v_lastName, volunteer.v_state, volunteer.v_image, volunteer.v_image_type, project.p_name
        FROM volunteer INNER JOIN 
        ( project INNER JOIN project_volunteer ON project.project_ID = project_volunteer.project_ID )
        ON volunteer.volunteer_ID = project_volunteer.volunteer_ID 
        WHERE project_volunteer.project_ID=3 ";        
        //'.$_SESSION["project_ID"].'
        
        $result = $pdo -> query($sql);
        $pdo->commit();           
    ?>

    <!-- START volunteers list -->   
      <div class="container">     
        <div class="row">      
        <?php
              while($data = $result -> fetch())  {
                $id = $data["volunteer_ID"];  
                $pid = $data["project_ID"];
                $image = $data["v_image"];
                $imageType = $data["v_image_type"];
              ?> 
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">

              <div class="img" style="background-image: url(<?php echo 'data:' . $imageType . ';base64,' . base64_encode($image) . '';?>);"></div>
        				<div class="info ml-4">
        					<h3><a href="teacher-single.html"><?php echo $data["v_firstName"] . " " . $data["v_lastName"]; ?></a></h3>
        					<span class="position"><?php echo $data["v_state"]; ?></span>              
                  <!-- <a href="#removeModal<//?php echo $id; ?>" type="button" data-vol="<//?php echo $id; ?>" data-project="<//?php echo $pid; ?>" class="del fa fa-trash" data-toggle="modal" data-target="#removeModal</?php echo $id; ?>" type="button" ></a> -->
                  <button type="button" data-vol="<?php echo $id; ?>" data-project="<?php echo $pid; ?>" class="del fa fa-trash"  type="button" ></button>
                </div>
        			</div>
        		</div>
            
          </div>
          <!-- REMOVE modal -->
      <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">  
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="removeModalLabel">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure want to remove this volunteer from this project?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
              <button type="button" id="inside" class="btn btn-primary"> Confirm
              <!-- <a href="scripts/remove-volunteer.php </?php echo '?volunteer_ID='. $id; ?>"> Confirm </a>  -->
              </button>                   
            </div>
          </div>         
        </div>
      </div>     
              <?php } ?>
        </div>
      </div>
      <!-- END volunteers list -->

      
    
  <?php
          
      } catch (Exception $e) {
          $pdo->rollback();
          echo "Error: ".$e;
      }
      $pdo = null;
  ?>
  </section>

    <!-- ADD MORE volunteers button -->
    <section class="ftco-section-3 img" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex">
        <div class="box">
          <a href="assign-volunteers.php" class="btn btn-white btn-animation-1">Add More Volunteers </a> 
        </div>   			
    		</div>
    	</div>
    </section>
    

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
        <div class="col-md-5">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Upcoming Projects</h2>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="projects.html">Safety Training to Growing Children</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> July 12, 2019</a></div>
                  <div><a href="#"><span class="icon-person" name="Organisation"></span> We Love Earth</a></div>
                 
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="projects.html">Clean Water for Rural Areas</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> November 25, 2019</a></div>
                  <div><a href="#"><span class="icon-person" name="Organisation"></span> Hope Org</a></div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
           <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Site Links</h2>
            <ul class="list-unstyled">
              <li><a href="projects.html" class="py-2 d-block">Projects</a></li>
              <li><a href="meetingreport.html" class="py-2 d-block">Reports</a></li>
              <li><a href="listvolunteer.html" class="py-2 d-block">Volunteers</a></li>
              <li><a href="userProfileMain.html" class="py-2 d-block">Profile</a></li>
              <li><a href="login.html" class="py-2 d-block">Log Out</a></li>
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
  <script src="js/assignProject.js"></script>
  </body>
</html>