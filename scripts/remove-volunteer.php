<?php
      try {
        include_once("config.php");
        
        $sql2 = "DELETE FROM project_volunteer WHERE volunteer_ID='" . $_GET["vol"] . "' AND project_ID='" . $_GET["project"] . "'";
        //$sql2 = " DELETE FROM project_volunteer WHERE volunteer_ID=".$_GET["volunteer_ID"]." &  project_ID=".$_GET["project_ID"]." ";
        $pdo->exec($sql2);
        echo "Record deleted successfully";
        header("Location:../project-volunteers.php");
      }
      catch(PDOException $e)
          {
          echo $sql2 . "
      " . $e->getMessage();
          }

      $pdo = null;
    ?>