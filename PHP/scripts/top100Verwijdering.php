<?php

require_once "connect.php";

if (isset($_GET['evenement'])){
    $evenement = urldecode($_GET['evenement']);
    $e_sql = "EXEC usp_Top100_Delete @EVENEMENT_NAAM = '$evenement'";
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();

    $error = $e_query->errorCode();
    if (empty($error) || 00000 == $error){
        header("Location: ../evenementgegevens.php?evenement=" . $evenement . "&beheerder=1&result=top100deletesuccess");
    }
    else {
        header("Location: ../evenementgegevens.php?evenement=" . $evenement . "&beheerder=1&result=top100deleteerror");
    }
}