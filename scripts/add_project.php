<?php 

	$projectName = $summary = $description = "";
	$target = 0;
    $image = null;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if ( isset($_POST["projectName"]) && isset($_POST["target"]) && isset($_POST["summary"]) && isset($_POST["description"]) && isset ($_FILES['image']['name']) ) {
			$projectName = $_POST["projectName"];
			$target = $_POST["target"];
			$summary = $_POST["summary"];
			$description = $_POST["description"];
			$image = $_FILES['image']['name'];
		}
	} else {
		if (  isset($_GET["projectName"]) && isset($_GET["target"]) && isset($_GET["summary"]) && isset($_GET["description"]) && isset($_GET["image"])) {			
			$projectName = $_GET["projectName"];
			$target = $_GET["target"];
			$summary = $_GET["summary"];
			$description = $_GET["description"];
			$image = $_GET["image"];
		}	
	}
	include_once("config.php");
	try {
		$pdo->beginTransaction();
		$sql = "INSERT INTO project(p_name,p_summary,p_description,p_target,p_image) VALUES('$projectName','$summary','$description','$target','$image')";
        $pdo->query($sql);
        echo "New record created successfully.";
		$pdo->commit();
	} catch (Exception $e) {
        $pdo->rollback();
        echo "Error: ".$e;
	}
	$pdo = null;
?>