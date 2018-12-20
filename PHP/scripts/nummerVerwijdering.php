<?php
require_once "connect.php";

if (isset($_GET['titel'])) {
    $nummer = urldecode($_GET['titel']);
    $artiest = urldecode($_GET["artiest"]);

    $sqlNummer = "EXECUTE usp_Nummer_Delete @titel = '$nummer', @artiest = '$artiest'";
    $query = $conn->prepare($sqlNummer);
    $query->execute();

    $nummer_url = urlencode($nummer);
    header("location: ../nummers.php?deleted='$nummer_url'");

}
else {
    header('location: ../nummers.php');
}




?>