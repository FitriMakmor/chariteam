<?php
    $projectID = $_GET["projectID"];
    if($_SERVER['REQUEST_METHOD'] === 'GET') {   
      if(empty($_GET['selected'])) {
        
        echo '
        <script type="text/javascript"> 
        alert("You did not select any volunteer."); 
        window.location.href = "../assign-volunteers.php";
        </script>;
        ';
          
      } else {      
        foreach($_GET['selected'] as $value){
            try {
              include("config.php");
              
              $sql3 = "INSERT INTO project_volunteer (project_ID, volunteer_ID) VALUES ('$projectID', '$value')";
              $pdo->exec($sql3);
              echo "Record added successfully";
              header("Location:../project-volunteers.php?project_ID=".$projectID);
            }

            catch(PDOException $e) {
              echo $sql3 . "" . $e->getMessage();
            }       
            $pdo = null;
        }           
      }
    }
?>

