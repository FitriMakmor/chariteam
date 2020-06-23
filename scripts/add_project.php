<?php
session_start();

$projectName = $summary = $description = "";
$target = 0;
$image = null;
$success = false;
$ready = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["projectName"]) && isset($_POST["startDate"]) && isset($_POST["endDate"]) && isset($_POST["summary"]) && isset($_POST["description"]) && isset($_FILES['image']['name']) && isset($_SESSION["userID"])) {
		$projectName = addslashes($_POST["projectName"]);
		$userID = $_SESSION["userID"];
		$startDate = $_POST["startDate"];
		$endDate = $_POST["endDate"];
		$summary = addslashes($_POST["summary"]);
		$description = addslashes($_POST["description"]);
		$imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$imageProperties = getimagesize($_FILES['image']['tmp_name']);
		$ready = true;
	} else {
		header("Location:../addProject.php?np=fail");
	}
} else {
	if (isset($_GET["projectName"]) && isset($_GET["startDate"]) && isset($_GET["endDate"]) && isset($_GET["summary"]) && isset($_GET["description"]) && isset($_FILES['image']['name']) && isset($_SESSION["userID"])) {
		$projectName = addslashes($_GET["projectName"]);
		$userID = $_SESSION["userID"];
		$startDate = $_GET["startDate"];
		$endDate = $_GET["endDate"];
		$summary = addslashes($_GET["summary"]);
		$description = addslashes($_GET["description"]);
		$imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$imageProperties = getimagesize($_FILES['image']['tmp_name']);
		$ready = true;
	} else {
		header("Location:../addProject.php?np=fail");
	}
}
if ($ready) {
	include_once("config.php");
	try {
		$pdo->beginTransaction();
		if (isset($_GET["project_ID"])) {
			$sql = "UPDATE project SET p_name = '$projectName', p_start_date = '$startDate', p_end_date = '$endDate', p_summary = '$summary', p_description = '$description', p_image = '$imageData', p_image_type = '{$imageProperties['mime']}' WHERE project_ID=".$_GET["project_ID"];
		} else {
			$sql = "INSERT INTO project(p_name,userID,p_start_date,p_end_date,p_summary,p_description,p_image,p_image_type) VALUES('$projectName','$userID','$startDate','$endDate','$summary','$description','$imageData','{$imageProperties['mime']}')";
		}
		$pdo->query($sql);
		$pdo->commit();
		if (isset($_GET["project_ID"])) {
			header("Location:../projects.php?np=success_edit");
		} else {
			header("Location:../projects.php?np=success_add");
		}	
	} catch (Exception $e) {
		$pdo->rollback();
		echo "Error: " . $e;
		header("Location:../addProject.php?np=fail");
	}
	$pdo = null;
}
