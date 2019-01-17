<?php

require_once "phpfunctions.php";
require_once "connect.php";

if(isset($_POST['bewerk'])) {
    $oudeNaam = urldecode($_GET['artiest']);
    $nieuweNaam = '';

    if(strcmp($_POST['nieuweNaam'], $_POST['nieuweNaamB']) == 0) {
        $nieuweNaam = $_POST['nieuweNaam'];

        $sqlArtiest = "EXECUTE usp_Artiest_Update @OldArtiest = '$oudeNaam', @newArtiest = '$nieuweNaam'";
        $e_query = $conn->prepare($sqlArtiest);
        $e_query->execute();

        $error = $e_query->errorCode();
        if (empty($error) || 00000 == $error){
            header("Location:nummers.php?result=artiestupdatesuccess");
        }
        else{
            header("Location:nummers.php?result=artiestupdateerror");
        }
    }

}
