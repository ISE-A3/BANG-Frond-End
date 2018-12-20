<?php

require_once "phpfunctions.php";
require_once "connect.php";

if(isset($_POST['bewerk'])) {
    $oudeNaam = urldecode($_GET['artiest']);
    $nieuweNaam = '';

    if(strcmp($_POST['nieuweNaam'], $_POST['nieuweNaamB']) == 0) {
        $nieuweNaam = $_POST['nieuweNaam'];

        $sqlArtiest = "EXECUTE usp_Artiest_Update @OldArtiest = '$oudeNaam', @newArtiest = '$nieuweNaam'";
        $query = $conn->prepare($sqlArtiest);
        $query->execute();

        header('location: nummers.php');
    }

}
