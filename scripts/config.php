<?php

try {
    $connString = "mysql:host=localhost;dbname=project";
    $user = "user1";
    $pass = "user1abc";

    $pdo = new PDO($connString,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die($e->getMessage());
}

?>