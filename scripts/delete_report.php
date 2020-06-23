<?php
if (isset($_GET["report_ID"])) {
	include("config.php");
	$projectID = $_GET["project_ID"];
	$reportID = $_GET["report_ID"];
	try {
		$pdo->beginTransaction();
		$sql = "DELETE FROM report WHERE report_ID=" . $reportID;
		$pdo->query($sql);
		$pdo->commit();
		header("Location:../listOfReports1.php?np=success_delete&project_ID=".$_GET["project_ID"]."&page=1");
		
	} catch (Exception $e) {
		$pdo->rollback();
		echo "Error: " . $e;
		header("Location:../listOfReports1.php?np=fail_delete&project_ID=".$_GET["project_ID"]."&page=1");
	}
	$pdo = null;
} else {
	echo "Error: Report not selected! (Report ID not set)";
}