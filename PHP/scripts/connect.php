<?php
session_start();

if(isset($_SESSION['gebruiker'])){
    $usr = $_SESSION['gebruiker'];
    $pwd = $_SESSION['wachtwoord'];
}
else {
    header('Location: login.php');
}

$hostname = "localhost";
$dbname = "BANG";

//Verbind met database
$conn = new pdo ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", $usr, $pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($conn)) {//Als er geen connectie is, dan naar error.php
    header('location: 404.html');
}

?>