<?php
if(isset($_POST['vervang'])) {

    if (!empty($_POST['nieuweArtiest'])){
        $nieuweArtiest = $_POST['nieuweArtiest'];
        $nummer = urldecode($_GET['titel']);
        $artiest = urldecode($_GET['artiest']);

        include ("scripts/connect.php");
        $sqlNummer = "EXECUTE usp_Nummer_ReplaceArtiest @titel = '".$nummer."', @oldArtiest = '".$artiest."', @newArtiest = '".$nieuweArtiest."'";
        $e_query = $conn->prepare($sqlNummer);
        $e_query->execute();

        $error = $e_query->errorCode();
        if (empty($error) || 00000 == $error){
            header("Location:nummers.php?result=artiestreplacesuccess");
        }
        else{
            header("Location:nummers.php?result=artiestreplaceerror");
        }
    }

}
