<?php
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
session_start();
$userID = $_SESSION['userID'];
include("config.php");

//getting id of the data from url


//3. Execute the SQL query. 
//Delete a user.
try {
  // begin a transaction
  $pdo->beginTransaction();
  // a set of queries: if one fails, an exception will be thrown
  $sql = "DELETE FROM user WHERE userID=$userID";
  $pdo->query($sql);//run the query & returns a PDOStatement object
  // if we arrive here, it means that no exception was thrown
  // which means no query has failed, so we can commit the
  // transaction
  $pdo->commit();
} catch (Exception $e) {
  // we must rollback the transaction since an error occurred
  // with insert
  $pdo->rollback();
}

//Step 5: Freeing Resources and Closing Connection using mysqli
$pdo = null;

//4. Process the results.
//redirecting to the display page (index.php in our case)
header("Location:login.php");



?>

