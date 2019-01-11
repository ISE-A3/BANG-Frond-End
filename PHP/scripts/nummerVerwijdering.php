<?php
require_once "connect.php";

if (isset($_GET['titel'])&&isset($_GET['artiest'])) {
    $nummer = urldecode($_GET['titel']);
    $artiest = urldecode($_GET["artiest"]);

    $sqlNummer = "EXECUTE usp_Nummer_Delete @titel = '$nummer', @artiest = '$artiest'";
    $e_query = $conn->prepare($sqlNummer);
    $e_query->execute();

    $error = $e_query->errorCode();
    if (empty($error) || 00000 == $error){
        header("Location: ../nummers.php?result=nummerdeletesuccess");
    }
    else{
        header("Location: ../nummers.php?result=nummerdeleteerror");
    }

}
else {
    header("Location: ../nummers.php?result=nummerdeleteerror");
}




?>