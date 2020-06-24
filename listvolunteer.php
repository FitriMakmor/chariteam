<?php
include_once("scripts/config.php");
session_start();
$userID=$_SESSION["userID"];
 
?>
<!DOCTYPE html>
<html lang="en">
  <style>
    span1 {
  color: #000000; }
  </style>
  <head>

    <title>Chariteam - Volunteer Profile</title>
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
    <link rel="stylesheet" href="css/button.css">
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
          <li class="nav-item active"><a href="listvolunteer.php?page=1" class="nav-link">Volunteers</a></li>
          <li class="nav-item"><a href="userProfileMain.php?userID=<?php echo $_SESSION['userID'] ?>" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li> 
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
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> <span>Volunteers</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">List of Volunteers</h1>
          </div>
        </div>
      </div>
    </div>

   
    
    <section class="ftco-section bg-light">
      <div class="container" style="border: #000000;"><div class="row">

      <?php
      $stmt = $pdo->prepare('SELECT * FROM volunteer ORDER BY volunteer_ID');
      $stmt->execute();
      $page=$_GET["page"];
      if($stmt->rowCount()>$page*9-9){
        $count=1;
          while(($row=$stmt->fetch(PDO::FETCH_ASSOC))&& ($count<=(9*$page))){
            // $count=$count+1;
            // extract($row);
            if($page==1){
              $count=$count+1;
              extract($row);
            
            ?>
            
             <!-- style=" -->
        	<div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" style="width:500px;background: rgb(216, 216, 216);">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(<?php echo 'data:' . $v_image_type . ';base64,' . base64_encode($v_image) . ''; ?>);"></div>
                
              	<div class="info ml-4">
        					<h3><a href ="displayprofile.php?v_ID=<?php echo $row["volunteer_ID"];?>"><?php echo $row["v_firstName"]." ";echo $row["v_lastName"]?></a></h3>
        					<span1 class="position"><?php echo $row['v_IC']?></span1>
        					<div class="text">
		        				<p>Join 
                    <?php
                    $start_date = strtotime($row['v_DOR']);
                   $end_date =time();
                   $datediff = $end_date-$start_date;
                   echo round($datediff / (60 * 60 * 24));
                     ?>
                    days ago</p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	</div>
          <?php
          }else if($page==2){
            extract($row);
            if($count>9 ){
              ?>
              <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" style="width:500px;background: rgb(216, 216, 216);">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(<?php echo 'data:' . $v_image_type . ';base64,' . base64_encode($v_image) . ''; ?>);"></div>
                
              	<div class="info ml-4">
        					<h3><a href ="displayprofile.php?v_ID=<?php echo $row["volunteer_ID"];?>"><?php echo $row["v_firstName"]." ";echo $row["v_lastName"]?></a></h3>
        					<span1 class="position"><?php echo $row['v_IC']?></span1>
        					<div class="text">
		        				<p>Join 
                    <?php
                    $days = '365';
                    $start_date = strtotime($row['v_DOR']);
                    $end_date =time();
                    $datediff = $end_date-$start_date;
                   echo round($datediff / (60 * 60 * 24));
                     ?>
                    days ago</p>
		        			</div>
        				</div>
        			</div>
        		</div>
          	</div>
              <?php
              
            }$count=$count+1;
          }else if($page==3){
            
            extract($row);
            if($count>18 && extract($row)==true){
              ?>
            <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
        		<div class="staff" style="width:500px;background: rgb(216, 216, 216);">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(<?php echo 'data:' . $v_image_type . ';base64,' . base64_encode($v_image) . ''; ?>);"></div>
                
              	<div class="info ml-4">
        					<h3><a href ="displayprofile.php?v_ID=<?php echo $row["volunteer_ID"];?>"><?php echo $row["v_firstName"]." ";echo $row["v_lastName"]?></a></h3>
        					<span1 class="position"><?php echo $row['v_IC']?></span1>
        					<div class="text">
		        				<p>Join 
                    <?php
                    $days = '365';
                    $start_date = strtotime($row['v_DOR']);
                    $end_date =time();
                    $datediff = $end_date-$start_date;
                   echo round($datediff / (60 * 60 * 24));
                     ?>
                    days ago</p>
		        			</div>
        				</div>
        			</div>
        		</div>
        	   </div>
              <?php  $count=$count+1;
            }
              
          }
        }
      }else{
        ?>
	    <div class="col text-center">
	   	<div class="alert alert-warning">
			<span class="glyphicon glyphicon-info-sign"></span>&nbsp; No Data Found.
		</div>
	</div>
	<?php
}
?>

    </div>
        <div class="row mt-5">
          <div class="col text-center">
            
            <div class="block-27">
              <ul>
                
                <li><a href="listvolunteer.php?page=<?php if($page==1)echo "1";else echo ($page-1)?>">&lt;</a></li>
                <?php
                for($i=1;$i<5;$i++){
                  if($page==$i){?>
                    <li class="active"><span><?php echo $page?></span></li> 

                 <?php }else{ ?>
                    <li><a href="listvolunteer.php?page=<?php echo $i?>"><?php echo $i?></a></li>
                 <?php }
                }
                ?>
                <li><a href="listvolunteer.php?page=<?php if($page==4)echo "4";else echo ($page+1)?>">&gt;</a></li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <section class="ftco-section-3 img" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex">
           
            <div class="box">
              <a href="createvolunteer.php"class="btn btn-primary1" type="button">Add new Volunteers</a>
          </div>
    		  			
    		</div>
    	</div>
    </section>
    <?php  $pdo =null;?>


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
              <li><a href="listvolunteer.php?page=1" class="py-2 d-block">Volunteers</a></li>
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
    
  </body>
</html>