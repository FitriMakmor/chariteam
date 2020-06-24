<?php
session_start();
$userID=$_SESSION["userID"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chariteam - Reports</title>
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
        <a class="navbar-brand" href="about.php">Chariteam</a>
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
    
    <?php
      include_once("scripts/config.php");
      $projectID = $_GET["project_ID"];
      $sql2 = "SELECT * FROM project WHERE project_ID= $projectID";
      $stmt2 = $pdo->prepare($sql2);
      $stmt2->execute();
      $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="hero-wrap" style="background-image: url('images/report1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
              href="projects.php">Projects</a></span</p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $row2["p_name"]?></h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row py-4">
          <div class="col-md-6">
            <h3 class="">List of Reports</h3>
          </div>
          <div class="col-md-6">
            <div class="float-right">
              <h4 class="d-inline mr-2">Add Report</h4>
              <a href="addreport.php?project_ID=<?php echo $projectID; ?>" type="button" class="float-center btn btn-default" aria-label="Add Project">
                <span class="oi oi-plus" aria-hidden="true">
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="row" id="page1">
          <?php
            $page=$_GET["page"];
            $reportNo = 1;
            $sql = "SELECT * FROM report WHERE project_ID=" . $projectID ."";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()>$page*6-6){
              while(($row=$stmt->fetch(PDO::FETCH_ASSOC))&& ($reportNo<=(6*$page))){
                if ($page == 1){
                  $reportNo++;
                  extract($row);
                
          ?>
          <div class="col-lg-4 mb-sm-4 ftco-animate">
          	<div class="staff">
              <div class="info ml-4" style="width:280px;" style="height:250px;">
              	<div class="meta mb-3">
                  <div><p style="color:royalblue"><?php echo $r_date; ?></p></div>
                </div>
                <h3 class="text-info mr-4"><p style="color:darkorange"><?php echo $r_name; ?></p></h3>
                <div style="height: 120px;">
                  <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> <?php echo $r_startTime; ?>-<?php echo $r_endTime; ?><br></span><span><i class="icon-map-o"></i><?php echo $r_venue; ?><br></span><span class="mr-2"><i class="icon-flag-o"></i><?php echo $r_purpose;?></span></p>
                </div>
                <div class="text-center" style="margin-left:auto;margin-right:auto;">
                  <a href="editreport.php?report_ID=<?php echo $report_ID;?>&project_ID=<?php echo $projectID?>" type="button" class="btn-center btn btn-default" aria-label="Edit Report">
                    <span class="oi oi-pencil" aria-hidden="true"></span>
                  </a>
                  <a href="#deleteModal<?php echo $report_ID;?>" type="button" class="btn-center btn btn-default" data-toggle="modal" data-target="#deleteModal<?php echo $report_ID;?>" aria-label="Delete Report">
                    <span class="oi oi-minus" aria-hidden="true"></span>
                  </a>
                  <a href="#modal<?php echo $report_ID;?>" type="button" class="btn-center btn btn-default" data-toggle="modal" data-target="#modal<?php echo $report_ID;?>" aria-label="View Report">
                    <span class="oi oi-eye" aria-hidden="true"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php
                }else if ($page == 2){
                  extract($row);
                  if($reportNo>6){
                    ?>
          <div class="col-lg-4 mb-sm-4 ftco-animate">
          	<div class="staff">
              <div class="info ml-4" style="width:280px;" style="height:250px;">
              	<div class="meta mb-3">
                  <div><p style="color:royalblue"><?php echo $r_date; ?></p></div>
                </div>
                <h3 class="text-info mr-4"><p style="color:darkorange"><?php echo $r_name; ?></p></h3>
                <div style="height: 120px;">
                  <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> <?php echo $r_startTime; ?>-<?php echo $r_endTime; ?><br></span><span><i class="icon-map-o"></i><?php echo $r_venue; ?><br></span><span class="mr-2"><i class="icon-flag-o"></i><?php echo $r_purpose;?></span></p>
                </div>
                <div class="text-center" style="margin-left:auto;margin-right:auto;">
                  <a href="editreport.php?report_ID=<?php echo $report_ID;?>&project_ID=<?php echo $projectID?>" type="button" class="btn-center btn btn-default" aria-label="Edit Report">
                    <span class="oi oi-pencil" aria-hidden="true"></span>
                  </a>
                  <a href="#deleteModal<?php echo $report_ID;?>" type="button" class="btn-center btn btn-default" data-toggle="modal" data-target="#deleteModal<?php echo $report_ID;?>" aria-label="Delete Report">
                    <span class="oi oi-minus" aria-hidden="true"></span>
                  </a>
                  <a href="#modal<?php echo $report_ID;?>" type="button" class="btn-center btn btn-default" data-toggle="modal" data-target="#modal<?php echo $report_ID;?>" aria-label="View Report">
                    <span class="oi oi-eye" aria-hidden="true"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php 
                  }$reportNo++;
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
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="listOfReports1.php?project_ID=<?php echo $projectID?>&page=<?php if($page==1)echo "1";else echo ($page-1)?>">&lt;</a></li>
                <?php
                for($i=1;$i<5;$i++){
                  if($page==$i){?>
                    <li class="active"><span><?php echo $page?></span></li> 

                 <?php }else{ ?>
                    <li><a href="listOfReports1.php?project_ID=<?php echo $projectID?>&page=<?php echo $i?>"><?php echo $i?></a></li>
                 <?php }
                }
                ?>
                <li><a href="listOfReports1.php?project_ID=<?php echo $projectID?>&page=<?php if($page==4)echo "4";else echo ($page+1)?>">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Delete Confirmation -->
    <div class="modal fade" id="<?php echo "deleteModal" . $report_ID;?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this item?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a href="scripts/delete_report.php?report_ID=<?php echo $report_ID;?>&project_ID=<?php echo $projectID?>" class="btn btn-primary">Delete</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="<?php echo "modal" . $report_ID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $r_name; ?> Contents</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Participants: </p><?php echo $r_comments?><br><br><br><p>Content: </p><?php echo $r_content?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

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
  if (isset($_GET["np"])) {
    if ($_GET["np"] == "success_add") {
      echo "<script>alert(\"Report added successfully!\")</script>";
    } elseif ($_GET["np"] == "success_edit") {
      echo "<script>alert(\"Report edited successfully!\")</script>";
    } elseif ($_GET["np"] == "success_delete") {
      echo "<script>alert(\"Report deleted successfully!\")</script>";
    }  elseif ($_GET["np"] == "fail_delete") {
      echo "<script>alert(\"Error in deleting project!\")</script>";
    } 
  }
  ?>
  </body>
</html>