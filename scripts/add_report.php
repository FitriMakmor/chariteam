<?php
  $report_ID = $project_ID = $r_name = $r_date = $r_startTime = $r_endTime = "";
  $r_venue = $r_content = $r_purpose = $r_comments  = "";

  include_once("config.php");
  if(isset($_POST["submit"])){
    
      
      $report_name = $_POST["reportName"];
      $date = $_POST["date"];
      $purpose = $_POST["purpose"];
      $startTime = $_POST["startTime"];
      $endTime = $_POST["endTime"];
      $venue = $_POST["venue"];
      $content = $_POST["content"];
      $comments = $_POST["comments"];
  
  
    $project_ID = $_GET["project_ID"];
    $sql = "INSERT INTO report(project_ID, r_name, r_purpose, r_date, r_startTime, r_endTime, r_venue, r_content, r_comments) VALUES ('$project_ID', '$report_name','$purpose','$date','$startTime','$endTime', '$venue', '$content' , '$comments')";
    $add = $pdo->prepare($sql);
    $add->execute();
    header("Location:../listOfReports1.php?np=success_add&project_ID=".$_GET["project_ID"]."&page=1");
		
  }
?>