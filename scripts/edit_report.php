<?php
  $report_ID = $project_ID = $r_name = $r_date = $r_startTime = $r_endTime = "";
  $r_venue = $r_purpose = $r_content = $r_comments = $r_file = "";

  include_once("config.php");
  if(isset($_POST['submit'])){
    
      
      $report_name = $_POST["reportName"];
      $date = $_POST["date"];
      $purpose = $_POST["purpose"];
      $venue = $_POST["venue"];
      $startTime = $_POST["startTime"];
      $endTime = $_POST["endTime"];
      $content = $_POST["content"];
      $comments = $_POST["comments"];
  
    $projectID = $_GET["project_ID"];
    $reportID = $_GET["report_ID"];
    $sql = "UPDATE report SET r_name = '$report_name', r_purpose = '$purpose', r_venue = '$venue', r_date = '$date', r_startTime = '$startTime', r_endTime = '$endTime', r_content = '$content', r_comments = '$comments' WHERE report_ID=".$_GET["report_ID"];
    $edit = $pdo->prepare($sql);
    $edit->execute();
    if (isset($_GET["report_ID"])) {
        header("Location:../listOfReports1.php?np=success_edit&project_ID=".$_GET["project_ID"]."&page=1");
    }

  }
?>