<?php
if (isset($_GET["project_ID"])) {
	include("config.php");
	$projectID = $_GET["project_ID"];
	try {
		$pdo->beginTransaction();
		$sql = "DELETE FROM project WHERE project_ID=" . $projectID;
		$pdo->query($sql);
		$pdo->commit();
		header("Location:../projects.php?np=success_delete");
	} catch (Exception $e) {
		$pdo->rollback();
		echo "Error: " . $e;
		header("Location:../projects.php?np=fail_delete");
	}
	$pdo = null;
} else {
	echo "Error: Project not selected! (Project ID not set)";
}
