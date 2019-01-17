<?php

require_once "connect.php";

if(isset($_POST['bewerk'])) {
    $oudeNaam = urldecode($_GET['titel']);
    $artiest = urldecode($_GET['artiest']);

    if(strcmp($_POST['nieuweNaam'], $_POST['nieuweNaamB']) == 0) {

        $nieuweNaam = $_POST['nieuweNaam'];
        $sqlNummer = "EXECUTE usp_Nummer_UpdateTitel @oldTitel = '$oudeNaam', @artiest = '$artiest', @newTitel = '$nieuweNaam'";
        $e_query = $conn->prepare($sqlNummer);
        $e_query->execute();

        $error = $e_query->errorCode();
        if (empty($error) || 00000 == $error){
            header("Location:nummers.php?result=nummerupdatesuccess");
        }
        else{
            header("Location:nummers.php?result=nummerupdateerror");
        }
    }

}
