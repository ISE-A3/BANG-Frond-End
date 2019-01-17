<?php

require_once "connect.php";

if (isset($_GET['vraag'])) {
    $vraag = urldecode($_GET['vraag']);
    $e_sql = "EXEC usp_Vraag_Delete @VRAAG_NAAM = '$vraag'";
    $e_query = $conn->prepare($e_sql);
    $e_query->execute();

    header('location: ../vragenOverzicht.php?beheerder=1');

}
    ?>