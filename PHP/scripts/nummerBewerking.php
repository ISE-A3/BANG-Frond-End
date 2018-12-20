<?php

require_once "connect.php";

if(isset($_POST['bewerk'])) {
    $oudeNaam = urldecode($_GET['titel']);
    $artiest = urldecode($_GET['artiest']);

    if(strcmp($_POST['nieuweNaam'], $_POST['nieuweNaamB']) == 0) {

        $nieuweNaam = $_POST['nieuweNaam'];
        $sqlNummer = "EXECUTE usp_Nummer_UpdateTitel @oldTitel = '$oudeNaam', @artiest = '$artiest', @newTitel = '$nieuweNaam'";
        $query = $conn->prepare($sqlNummer);
        $query->execute();

        header('location: nummers.php');
    }

}
