<?php
  if (isset($_GET["vol"]) && isset($_GET["pro"])) {
    include("config.php");
    
    try {
      $sql2 = "DELETE FROM project_volunteer WHERE volunteer_ID='" . $_GET["vol"] . "' AND project_ID='" . $_GET["pro"] . "' ";
      $pdo->exec($sql2);
      echo "Record deleted successfully";
      $projectID = $_GET["pro"];
      header("Location:../project-volunteers.php?project_ID=".$projectID);
      
    } catch (Exception $e) {
      $pdo->rollback();
      echo $sql2 . "  " . $e->getMessage();
    }
    $pdo = null;

  } else {
    echo "Error: Volunteer ID not selected!";
  }

?>
