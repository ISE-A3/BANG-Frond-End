<?php

$hostname = "localhost";
$dbname = "BANG";
$usr = "sa";
$pwd = "cuppie123";

//Verbind met database
$conn = new pdo ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", $usr, $pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($conn)) {//Als er geen connectie is, dan naar error.php
    header('location: 404.html');
}

?>