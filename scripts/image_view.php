<?php
include_once("config.php");
$pdo->beginTransaction();
$sql = "SELECT p_image, p_image_type FROM project WHERE project_ID=" . $_GET['project_ID'];
$result = $pdo->query($sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>");
while ($res = $result->fetch()) {
    // header("Content-type: " . $res["p_image_type"]);
    // echo $res["p_image"];
    echo '<img src="data:'.$res["p_image_type"].';base64,'.base64_encode( $res['p_image'] ).'"/>';
}
$pdo = null;
