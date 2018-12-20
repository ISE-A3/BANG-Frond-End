<?php

require_once "connect.php";


if (isset($_GET['evenement'])) {
    $evenement = $_GET['evenement'];
    if (isset($_POST['aanmaken'])) {
        $startdatum = $_POST['Startdatum'];
        $einddatum = $_POST['Einddatum'];
        $top_sql = "EXEC dbo.usp_Top100_Insert '$evenement', '$startdatum', '$einddatum'";
        $e_query = $conn->prepare($top_sql);
        $e_query->execute();

        header("Location:evenementgegevens.php?evenement=" . $evenement);
    }
}
?>