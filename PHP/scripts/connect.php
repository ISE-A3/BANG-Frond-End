<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 11-12-2018
 * Time: 15:14
 */
$hostname = "localhost";
$dbname = "BANG";
$usr = "BANG_FRONT_END";
$pwd = "L72)zdTQr&v$5n+M";

//Verbind met database
$conn = new pdo ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", $usr, $pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($conn)) {//Als er geen connectie is, dan naar error.php
    header('location: 404.html');
}

?>