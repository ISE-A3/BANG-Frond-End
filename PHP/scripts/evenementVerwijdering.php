<?php

require_once "connect.php";

if (isset($_GET['evenement'])){
    $evenement = urldecode($_GET['evenement']);
    $e_sql = "EXEC usp_Evenement_Delete @EVENEMENT_NAAM = '$evenement'";
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();

    header('location: ../evenement.php?m=deleted');
}