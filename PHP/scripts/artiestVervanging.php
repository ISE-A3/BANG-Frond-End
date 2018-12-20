<?php
if(isset($_POST['vervang'])) {
    if (empty($_POST['nieuweArtiest'])){
        $nieuweArtiest = $_POST['artiestKeuze'];
    }
    else {
        $nieuweArtiest = $_POST['nieuweArtiest'];
    }
    $nummer = urldecode($_GET['titel']);
    $artiest = urldecode($_GET['artiest']);

        $sqlNummer = "EXECUTE usp_Nummer_ReplaceArtiest @titel = '$nummer', @oldArtiest = '$artiest', @newArtiest = '$nieuweArtiest'";
        $query = $conn->prepare($sqlNummer);
        $query->execute();

        header("location: nummers.php?replaced='$nummer'");

}
