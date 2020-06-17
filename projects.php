<!DOCTYPE html>
<html lang="en">

<head>
  <title>Chariteam - Charity Projects</title>
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

  <div class="hero-wrap" style="background-image: url('images/prj_1dark.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="font-weight-bold">Projects</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Charity Projects</h1>
        </div>
      </div>
    </div>
  </div>

  <!--  <div class="container">
</div> -->

  <section class="ftco-section">
    <div class="container">
      <div class="row py-4">
        <div class="col-md-6">
          <h3 class="">Current Charity Projects</h3>
        </div>
        <div class="col-md-6">
          <div class="float-right">
            <h3 class="d-inline mr-2 text-info">Add a Project</h3>
            <a href="addProject.php" type="button" class="float-right btn btn-info btn-lg" aria-label="Add Project">
              <span class="oi oi-plus" aria-hidden="true">
              </span>
            </a>
          </div>
        </div>
      </div>
      <?php
      include_once("scripts/config.php");
      try {
        $pdo->beginTransaction();
        $sql = "SELECT * FROM project";
        $result = $pdo->query($sql);
        $projectNo = 0;
        while ($res = $result->fetch()) {
          $projectNo++;
          $projectID = $res["project_ID"];
          $projectName = $res["p_name"];
          $startDate = $res["p_start_date"];
          $endDate = $res["p_end_date"];
          $summary = $res["p_summary"];
          $description = $res["p_description"];
          $image = $res["p_image"];
          $imageType = $res["p_image_type"];
          if ($projectNo % 3 == 1) {
            if ($projectNo == 1) {
      ?>
              <div class="row d-flex" id="page1">
              <?php
            } else {
              ?>
              </div>
              <div class="row d-none" id=<?php $pNum = intdiv($projectNo, 3) + 1;
                                          echo "page" . $pNum; ?>>
            <?php
            }
          }

            ?>
            <div class="col-md-4 ftco-animate">
              <div class="cause-entry">
                <a href="#modal<?php echo $projectNo ?>" class="img" style="background-image: url(<?php echo 'data:' . $imageType . ';base64,' . base64_encode($image) . ''; ?>);" data-toggle="modal"></a>
                <div class="text p-3 p-md-4">
                  <h3 class="project-name-text"><a href="#modal<?php echo $projectNo; ?>" data-toggle="modal"><?php echo $projectName; ?></a></h3>
                  <div class="summary-div">
                  <p class="summary-text"><?php echo $summary; ?></p>
                  </div>

                  <?php
                  $earlier = new DateTime($startDate);
                  $later = new DateTime($endDate);
                  $totaldays = $later->diff($earlier)->format("%a");
                  $current = new DateTime("now");
                  $currdays = $current->diff($earlier)->format("%a");
                  $state = "";
                  if($current<$earlier){
                    $currdays = -$currdays;
                  }
                  if ($currdays < $totaldays && $currdays >= 0) {
                    $progress = intdiv($currdays * 100, $totaldays);
                    $state = "In Progress";
                  } else if ($currdays > $totaldays) {
                    $progress = 100;
                    $state = "Completed!";
                  } else {
                    $progress = 0;
                    $state = "Coming Soon";
                  }
                  ?>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $progress . "%"; ?>" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="text-center">Status: <?php echo $state; ?></p>
                  <span class="fund-raised d-block text-center"><?php echo $startDate; ?> until <?php echo $endDate; ?></span>
                  <div class="text-center">
                    <a href="editProject.php?project_ID=<?php echo $projectID; ?>" type="button" class="float-center btn btn-info" aria-label="Edit Project">
                      <span class="oi oi-pencil" aria-hidden="true">
                      </span>
                    </a>
                    <a href="#deleteModal<?php echo $projectNo; ?>" type="button" class="btn-center btn btn-info" data-toggle="modal" data-target="#deleteModal<?php echo $projectNo; ?>" type="button" aria-label="Delete Project">
                      <span class="oi oi-minus" aria-hidden="true">
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="<?php echo "modal" . $projectNo; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $projectName; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <img class="img-fluid" src="<?php echo 'data:' . $imageType . ';base64,' . base64_encode($image) . ''; ?>" alt="Cause One">
                  <div class="modal-body">
                    <?php echo $description ?>
                  </div>
                  <div class="modal-footer">
                    <a href="project-volunteers.html" class="btn btn-primary">Manage Volunteers</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Confirm Deletion Modal -->
            <div class="modal fade" id="<?php echo "deleteModal" . $projectNo; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you would like to delete the project?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="scripts/delete_project.php?project_ID=<?php echo $projectID ?>" class="btn btn-primary">Confirm</a>
                  </div>
                </div>
              </div>
            </div>

        <?php
        }
      } catch (Exception $e) {
        echo "Error: " . $e;
      }
      $pdo = null;
        ?>
              </div>

              <div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <?php
                      for ($i = 1; $i <= intdiv($projectNo - 1, 3) + 1; $i++) {
                      ?>
                        <li><button class="btn btn-warning" onclick="showPage('<?php echo 'page' . $i; ?>', <?php echo intdiv($projectNo, 3) + 1; ?>); return false;"><?php echo $i; ?></button></li>
                      <?php
                      }
                      ?>
                    </ul>
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
  <script src="js/projects.js"></script>

  <?php
  if (isset($_GET["np"])) {
    if ($_GET["np"] == "success_add") {
      echo "<script>alert(\"Project added successfully!\")</script>";
    } elseif ($_GET["np"] == "success_edit") {
      echo "<script>alert(\"Project edited successfully!\")</script>";
    } elseif ($_GET["np"] == "success_delete") {
      echo "<script>alert(\"Project deleted successfully!\")</script>";
    } elseif ($_GET["np"] == "fail_delete") {
      echo "<script>alert(\"Error in deleting project!\")</script>";
    }
  }

  ?>
</body>

</html>